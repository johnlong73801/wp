<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 's7' );

/** MySQL database username */
define( 'DB_USER', 's7' );

/** MySQL database password */
define( 'DB_PASSWORD', 'YYnQMUIbzK5OOy9RA40CR5Q0hGbDykU7JkLnOC11DPILYfrxo12FaBWlFLiY' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost:/var/run/mysqld/mysqld.sock' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '6rvs(oGW&{t{cuB&C}<,Z4-hdP2ij(x|d-Smx`G0n$(i&2euS0)_lzjZMpJ#|z51' );
define( 'SECURE_AUTH_KEY',  'VVWlG5::8nmX/Mh<(HkrNBuVG4pM_)J|R_Jm7S%>&3kjr;}:KxhVY%%j{jn0VQK8' );
define( 'LOGGED_IN_KEY',    '#?TJrF09gDs!/cW*R=s[bY;wt:Oc+Qv,Q2Cz<Zg?=ZQkL+@<C*$g&-oN:TKbQ^?;' );
define( 'NONCE_KEY',        '0|J{<Q@/lEg4w^k5 pCKP#!vxRQ+.n a)]D!XwK&H0U.T|%@%`-)_rCPF{Fd2TMo' );
define( 'AUTH_SALT',        '635?-wFGu *ZW0Nm;QpTR9EmM620^F/yfHO8]rsi#~Qti.XuSmzxZ=xu?4jRsBx5' );
define( 'SECURE_AUTH_SALT', ' (=eZ=.|&0M6.b1Tz@cM|wl^nd/4@gXARQO)rHJt8l?N -$uTV$ycLo=XHP_M/5x' );
define( 'LOGGED_IN_SALT',   '%p*i:|i&l*FdpMpH>tiK#!0LBr7Oo!o_fwl2{)o8yyfdFC{8=0h&Jn*l3k+jQYH/' );
define( 'NONCE_SALT',       'e[eBjuM5<rHtb/{6n#D^,1_jZgtI5X=LRm,*w#?JFjkTF4p4c >1&i-sSs<In8K_' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


require_once ABSPATH . 'lw-wp-config.php';


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
