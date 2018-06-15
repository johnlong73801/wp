<?php
/*
Plugin Name: Liquid Web Managed WordPress
Plugin URI: http://liquidweb.com
Description: Liquid Web Managed WordPress platform services.
Version: 1.3
Author: Liquid Web <support@liquidweb.com>
Author URI: http://liquidweb.com
*/

/**
 * Class LiquidWebMWP
 */
class LiquidWebMWP {
	var $pluginPath,
		$apiToken,
		$apiTokenURL,
		$requestStartTime;

	/**
	 * LiquidWebMWP constructor.
	 *
	 * @since 1.0
	 *
	 * @uses add_action() add_filter()
	 */
	public function __construct() {
		// Set Plugin Path
		$this->pluginPath = dirname( __FILE__ );

		// Set the API Token URL
		if ( defined( 'LWMWP_SITE_ENDPOINT' ) ) {
			$this->apiTokenURL = LWMWP_SITE_ENDPOINT;
		}
		// Set the API Token
		if ( defined( 'LWMWP_API_TOKEN' ) ) {
			$this->apiToken = LWMWP_API_TOKEN;
		}

		// Fix for BackWPUp blocking PHP from reloading.
		// Filter defined in backwpup/inc/class-job.php, and handle is not spelled correctly.
		add_filter( 'backwpup_job_signals_to_handel', array( $this, 'bypass_pcntl_signals' ), 9999, 1 );

		// add the actions
		add_action( '_core_updated_successfully', array( $this, 'core_update_callback' ), 10, 1 );

		// Listen for WooCommerce installs and notify the platform
		add_action( 'woocommerce_installed', array( $this, 'mwp_woocommerce_notification' ) );

		// Make a delayed call to MWP to avoid holding up requests for external calls.
		add_action( 'call_mwp_endpoint', array( $this, 'call_update_endpoint' ), 10, 1 );

		if ( isset( $_GET['lw-monitor'] ) ) {
			$this->requestStartTime = isset( $_SERVER['REQUEST_TIME_FLOAT'] ) ? $_SERVER['REQUEST_TIME_FLOAT'] : microtime(true);
			add_action( 'wp_footer', array( $this, 'show_monitor_info' ) );
		}

		add_filter( 'phpcompat_whitelist', array( $this, '_update_compatibility_whitelist' ) );

		// register wp-cli package(s)
		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			require_once $this->pluginPath . '/wp-cli-packages/regression_urls_command.php';
		}
	}

	/**
	 * Remove SIGTERM from the list of signals which backupwp captures to avoid
	 * issues shutting down
	 *
	 * @since 1.3
	 *
	 * @param array $signals List of signals to be captured.
	 */
	public function bypass_pcntl_signals( $signals ) {
		$index = array_search( 'SIGTERM', $signals );
		if ( $index !== false ) {
			unset( $signals[$index] );
		}

		return $signals;
	}

	/**
	 * Schedule an event to send a notification to MWP when WooCommerce is installed.
	 *
	 * @since 1.1
	 *
	 * @uses wp_schedule_single_event()
	 */
	public function mwp_woocommerce_notification() {
		$data = array(
			'is_ecommerce' => true,
		);
		wp_schedule_single_event( time(), 'call_mwp_endpoint', array( $data ) );
	}

	/**
	 * Send an update to MWP when the WordPress version of this site is updated.
	 *
	 * @since 1.0
	 *
	 * @param $wp_version
	 */
	public function core_update_callback( $wp_version ) {
		$this->update_lw_manager_site_info( $wp_version );
	}

	/**
	 * Add our custom whitelist entries to the php-compatibility-checker plugin
	 *
	 * @since 1.0
	 *
	 * @param $whitelist
	 */
	public function _update_compatibility_whitelist( $whitelist ) {
		return array_merge( $whitelist, array(
			'*/woocommerce-pdf-invoices-packing-slips/vendor/dompdf/dompdf/src/Adapter/CPDF.php',
			'*/woocommerce-pdf-invoices-packing-slips/vendor/phenx/php-svg-lib/src/Svg/Surface/SurfaceCpdf.php',
		) );
	}

	/**
	 * Schedule a notification to send information on this site's details back to MWP.
	 *
	 * @since 1.0
	 *
	 * @param $wp_version
	 *
	 * @uses wp_schedule_single_event()
	 *
	 */
	public function update_lw_manager_site_info( $wp_version ) {
		global $table_prefix;

		$data = array(
			'installed_version' => $wp_version,
			'target_version'    => $wp_version,
			'wp_table_prefix'   => $table_prefix,
		);

		wp_schedule_single_event( time(), 'call_mwp_endpoint', array( $data ) );
	}

	/**
	 * Send a PATCH request to the MWP instance to update parameters for more efficient management.
	 *
	 * @since 1.0
	 *
	 * @uses wp_remote_request()
	 *
	 * @param array $data
	 */
	public function call_update_endpoint( $data = array() ) {
		$headers = array(
			'Content-Type'   => 'application/json',
			'Authorization'  => 'Token ' . $this->apiToken,
			'Content-Length' => strlen( json_encode( $data ) )
		);

		wp_remote_request( $this->apiTokenURL, array(
			'method'  => 'PATCH', // The manager API using the LWMWP_SITE_ENDPOINT will accept a PATCH request
			'body'    => json_encode( $data ),
			'headers' => $headers,
		) );
	}

	/**
	 * Output Info for Monitoring
	 *
	 * @since 1.2
	 */
	public function show_monitor_info() {
		$totaltime = microtime(true) - $this->requestStartTime;
		$generatedtime = number_format( $totaltime, 3 );

		printf( "<!--\nLW Monitor Response:\n\nPage generated in %s seconds\n-->", esc_html( $generatedtime ) );
	}
}//end of class

$LiquidWebMWP = new LiquidWebMWP; //initialize

// Handles a GET request to report back the current installed WP version
if ( ( array_key_exists( 'managerapi', $_REQUEST ) ) && stristr( $_REQUEST['managerapi'], 'update' ) ) {
	global $wp_version;
	$LiquidWebMWP->update_lw_manager_site_info( $wp_version );
}

/* eof */
