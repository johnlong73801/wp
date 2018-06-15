<?php
/**
 * Aeroblog Theme Customizer.
 *
 * @package Aeroblog
 */

/**
 * Set default options
 */
if (! function_exists('aeroblog_get_defaults') ) :

    /**
     * Set default options
     */
    function aeroblog_get_defaults() 
    {

        $aeroblog_defaults = array(

         /**
             * Container
             */
         'container-width-page'    => 1100,
         'container-width-single'  => 1100,
         'container-width-archive' => 1100,

         /**
             * Sidebar
             */
         'sidebar-page'    => 'layout-content-sidebar',
         'sidebar-single'  => 'layout-no-sidebar',
         'sidebar-archive' => 'layout-content-sidebar',
        );

        return apply_filters('aeroblog_theme_defaults', $aeroblog_defaults);
    }

endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 */
if (! function_exists('aeroblog_customize_register') ) :

    /**
     * Add postMessage support for site title and description for the Theme Customizer.
     *
     * @param object $wp_customize Theme Customizer object.
     */
    function aeroblog_customize_register( $wp_customize ) 
    {

        /**
         * Override defaults
         */
        $wp_customize->get_setting('blogname')->transport         = 'postMessage';
        $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
        $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
        $wp_customize->get_control('header_textcolor')->label     = __('Site Title & Tagline Color', 'aeroblog');
        $wp_customize->get_control('background_color')->label     = __('Body Background Color', 'aeroblog');

        /**
         * Get default's
         */
        $defaults = aeroblog_get_defaults();

        /**
         * Load customizer helper files
         */
        include_once AEROBLOG_DIR . '/inc/customizer/customizer-callbacks.php';
        include_once AEROBLOG_DIR . '/inc/customizer/customizer-sanitize.php';
        include_once AEROBLOG_DIR . '/inc/customizer/customizer-controls.php';

        /**
         * Added custom customizer controls
         */
        if (method_exists($wp_customize, 'register_control_type') ) {
            $wp_customize->register_control_type('Aeroblog_Customize_Width_Slider_Control');
        }

        /**
         * Register Panel & Sections
         */
        if (class_exists('WP_Customize_Panel') ) :
            if (! $wp_customize->get_panel('aeroblog_panel_layout') ) {
                $wp_customize->add_panel(
                    'aeroblog_panel_layout', array(
                    'capability' => 'edit_theme_options',
                    'title'      => _x('Layout', 'Website Layout', 'aeroblog'),
                    'priority'   => 40,
                    )
                );
            }
        endif;

        $wp_customize->add_section(
            'aeroblog_section_container', array(
            'title'      => _x('Container', 'Website Container', 'aeroblog'),
            'capability' => 'edit_theme_options',
            'panel'      => 'aeroblog_panel_layout',
            )
        );

        $wp_customize->add_section(
            'aeroblog_sidebars', array(
            'title'      => __('Sidebars', 'aeroblog'),
            'capability' => 'edit_theme_options',
            'panel'      => 'aeroblog_panel_layout',
            )
        );

        /**
         * Register options
         */

        /**
         * Container Width - Archive
         */
        $wp_customize->add_setting(
            'aeroblog[container-width-archive]', array(
            'default'           => $defaults['container-width-archive'],
            'type'              => 'option',
            'sanitize_callback' => array( 'Aeroblog_Customize_Sanitize', '_sanitize_integer' ),
            'transport'         => 'postMessage',
            )
        );
        $wp_customize->add_control(
            new Aeroblog_Customize_Width_Slider_Control(
                $wp_customize, 'aeroblog[container-width-archive]', array(
                'label'           => __('Archive', 'aeroblog'),
                'description'     => __('Container width for archive pages.', 'aeroblog'),
                'tooltip'         => __('Container width is applied for the blog, category, tag and custom post type archive pages.', 'aeroblog'),
                'section'         => 'aeroblog_section_container',
                'priority'        => 0,
                'type'            => 'aeroblog-range-slider',
                'active_callback' => array( 'Aeroblog_Customize_Callback', '_sidebar_archive' ),
                'default'         => $defaults['container-width-archive'],
                'unit'            => 'px',
                'min'             => 700,
                'max'             => 2000,
                'step'            => 5,
                'settings'        => 'aeroblog[container-width-archive]',
                )
            )
        );

        /**
         * Container Width - Single Post
         */
        $wp_customize->add_setting(
            'aeroblog[container-width-single]', array(
            'default'           => $defaults['container-width-single'],
            'type'              => 'option',
            'sanitize_callback' => array( 'Aeroblog_Customize_Sanitize', '_sanitize_integer' ),
            'transport'         => 'postMessage',
            )
        );
        $wp_customize->add_control(
            new Aeroblog_Customize_Width_Slider_Control(
                $wp_customize, 'aeroblog[container-width-single]', array(
                'label'           => __('Single Post', 'aeroblog'),
                'description'     => __('Container width for the single post.', 'aeroblog'),
                'tooltip'         => __('Container width is applied for the single post.', 'aeroblog'),
                'section'         => 'aeroblog_section_container',
                'priority'        => 0,
                'type'            => 'aeroblog-range-slider',
                'default'         => $defaults['container-width-single'],
                'active_callback' => array( 'Aeroblog_Customize_Callback', '_sidebar_single' ),
                'unit'            => 'px',
                'min'             => 700,
                'max'             => 2000,
                'step'            => 5,
                'settings'        => 'aeroblog[container-width-single]',
                )
            )
        );

        /**
         * Container Width - Page
         */
        $wp_customize->add_setting(
            'aeroblog[container-width-page]', array(
            'default'           => $defaults['container-width-page'],
            'type'              => 'option',
            'sanitize_callback' => array( 'Aeroblog_Customize_Sanitize', '_sanitize_integer' ),
            'transport'         => 'postMessage',
            )
        );
        $wp_customize->add_control(
            new Aeroblog_Customize_Width_Slider_Control(
                $wp_customize, 'aeroblog[container-width-page]', array(
                'label'           => __('Page', 'aeroblog'),
                'description'     => __('Container width for the page.', 'aeroblog'),
                'tooltip'         => __('Container width is applied for the pages.', 'aeroblog'),
                'active_callback' => array( 'Aeroblog_Customize_Callback', '_sidebar_page' ),
                'section'         => 'aeroblog_section_container',
                'priority'        => 0,
                'type'            => 'aeroblog-range-slider',
                'default'         => $defaults['container-width-page'],
                'unit'            => 'px',
                'min'             => 700,
                'max'             => 2000,
                'step'            => 5,
                'settings'        => 'aeroblog[container-width-page]',
                )
            )
        );

        /**
         * Sidebar - Archive
         */
        $wp_customize->add_setting(
            'aeroblog[sidebar-archive]', array(
            'default'           => $defaults['sidebar-archive'],
            'type'              => 'option',
            'sanitize_callback' => array( 'Aeroblog_Customize_Sanitize', '_sanitize_choices' ),
            )
        );
        $wp_customize->add_control(
            'aeroblog[sidebar-archive]', array(
            'type'            => 'select',
            'label'           => __('Archive', 'aeroblog'),
            'description'     => __('Add sidebar layout for blog, archive, category tag pages.', 'aeroblog'),
            'section'         => 'aeroblog_sidebars',
            'active_callback' => array( 'Aeroblog_Customize_Callback', '_sidebar_archive' ),
            'choices'         => array(
            'layout-no-sidebar'              => __('Full Width ( No Sidebar )', 'aeroblog'),
            'layout-sidebar-content'         => __('Left Sidebar / Content', 'aeroblog'),
            'layout-content-sidebar'         => __('Content / Right Sidebar', 'aeroblog'),
            'layout-content-sidebar-sidebar' => __('Content / Left Sidebar / Right Sidebar', 'aeroblog'),
            'layout-sidebar-content-sidebar' => __('Left Sidebar / Content / Right Sidebar', 'aeroblog'),
            'layout-sidebar-sidebar-content' => __('Left Sidebar / Right Sidebar / Content', 'aeroblog'),
            ),
            )
        );

        /**
         * Sidebar - Single Post
         */
        $wp_customize->add_setting(
            'aeroblog[sidebar-single]', array(
            'default'           => $defaults['sidebar-single'],
            'type'              => 'option',
            'sanitize_callback' => array( 'Aeroblog_Customize_Sanitize', '_sanitize_choices' ),
            )
        );
        $wp_customize->add_control(
            'aeroblog[sidebar-single]', array(
            'type'            => 'select',
            'label'           => __('Single Post', 'aeroblog'),
            'description'     => __('Add sidebar layout for single post only.', 'aeroblog'),
            'section'         => 'aeroblog_sidebars',
            'active_callback' => array( 'Aeroblog_Customize_Callback', '_sidebar_single' ),
            'choices'         => array(
            'layout-no-sidebar'              => __('Full Width ( No Sidebar )', 'aeroblog'),
            'layout-sidebar-content'         => __('Left Sidebar / Content', 'aeroblog'),
            'layout-content-sidebar'         => __('Content / Right Sidebar', 'aeroblog'),
            'layout-content-sidebar-sidebar' => __('Content / Left Sidebar / Right Sidebar', 'aeroblog'),
            'layout-sidebar-content-sidebar' => __('Left Sidebar / Content / Right Sidebar', 'aeroblog'),
            'layout-sidebar-sidebar-content' => __('Left Sidebar / Right Sidebar / Content', 'aeroblog'),
            ),
            )
        );

        /**
         * Sidebar - Page
         */
        $wp_customize->add_setting(
            'aeroblog[sidebar-page]', array(
            'default'           => $defaults['sidebar-page'],
            'type'              => 'option',
            'sanitize_callback' => array( 'Aeroblog_Customize_Sanitize', '_sanitize_choices' ),
            )
        );
        $wp_customize->add_control(
            'aeroblog[sidebar-page]', array(
            'type'            => 'select',
            'label'           => __('Page', 'aeroblog'),
            'description'     => __('Add sidebar layout for pages only.', 'aeroblog'),
            'section'         => 'aeroblog_sidebars',
            'active_callback' => array( 'Aeroblog_Customize_Callback', '_sidebar_page' ),
            'choices'         => array(
            'layout-no-sidebar'              => __('Full Width ( No Sidebar )', 'aeroblog'),
            'layout-sidebar-content'         => __('Left Sidebar / Content', 'aeroblog'),
            'layout-content-sidebar'         => __('Content / Right Sidebar', 'aeroblog'),
            'layout-content-sidebar-sidebar' => __('Content / Left Sidebar / Right Sidebar', 'aeroblog'),
            'layout-sidebar-content-sidebar' => __('Left Sidebar / Content / Right Sidebar', 'aeroblog'),
            'layout-sidebar-sidebar-content' => __('Left Sidebar / Right Sidebar / Content', 'aeroblog'),
            ),
            )
        );

    }
    add_action('customize_register', 'aeroblog_customize_register');
endif;

/**
 * Customizer Preview JS
 */
if (! function_exists('aeroblog_customize_preview_js') ) :

    /**
     * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
     */
    function aeroblog_customize_preview_js() 
    {
        wp_enqueue_script('aeroblog-customizer-js', aeroblog_asset_url('customizer', 'js', '', 'admin'), array( 'customize-preview' ), '20151215', true);
    }
    add_action('customize_preview_init', 'aeroblog_customize_preview_js');

endif;

/**
 * Add CSS for our controls
 */
if (! function_exists('aeroblog_customizer_controls_css') ) :

    /**
     * Add CSS for our controls
     *
     * @since 1.0.0
     */
    function aeroblog_customizer_controls_css() 
    {
        wp_enqueue_style('aeroblog-customizer-controls-css', aeroblog_asset_url('customizer', 'css', '', 'admin'));
    }
    add_action('customize_controls_enqueue_scripts', 'aeroblog_customizer_controls_css');

endif;

/**
 * Generate Dynamic CSS
 */
if (! function_exists('aeroblog_dynamic_css') ) :

    /**
     * Generate Dynamic CSS from customizer option's
     */
    function aeroblog_dynamic_css() 
    {

        $space = ' ';

        // Generate CSS.
        $parse_css = array(

         '.error404 .site-content,
			 .page .site-content,
			 .error404 .custom-headers,
			 .page .custom-headers' => array(
        'max-width' => aeroblog_get_option('container-width-page') . 'px',
         ),

         '.archive .site-content,
			 .search .site-content,
			 .blog .site-content,
			 .archive .custom-headers,
			 .search .custom-headers,
			 .blog .custom-headers' => array(
        'max-width' => aeroblog_get_option('container-width-archive') . 'px',
         ),

         '.single .site-content,
			 .single .custom-headers' => array(
        'max-width' => aeroblog_get_option('container-width-single') . 'px',
         ),

        );

        // Output the above CSS.
        $output = '';

        foreach ( $parse_css as $selector => $properties ) {

            if (! count($properties) ) {
                continue;
            }

                  $temporary_output = $selector . ' {';
                  $elements_added   = 0;

            foreach ( $properties as $property => $css_value ) {
                if (empty($css_value) ) {
                    continue;
                }

                  $elements_added++;
                  $temporary_output .= $property . ': ' . $css_value . '; ';
            }

                  $temporary_output .= '}';

            if (0 < $elements_added ) {
                  $output .= $temporary_output;
            }
        }

        $output = str_replace(array( "\r", "\n", "\t" ), '', $output);

        wp_add_inline_style('aeroblog-core-css', esc_html($output));
    }
    add_action('wp_enqueue_scripts', 'aeroblog_dynamic_css');

endif;
