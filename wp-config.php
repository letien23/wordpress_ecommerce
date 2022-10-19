<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@fW#gXsG@#`%2s[!.S;(_>EUKAl4L:5}[#v&%FT,_ub+NT{P kgn</]ZCm9QbG?Q' );
define( 'SECURE_AUTH_KEY',  'Cn>TRw7jvQN^o~| vE!bARex[~~ma^vD=+ -04fgql50|*w&YXxYY}umT{z.S:A[' );
define( 'LOGGED_IN_KEY',    'S@IsCRE1IJ/XZ^$%#C~0/!MNykkDm(cl;+G4`L!eRFoMOmQ3|kM|;)1K,1*=QjF]' );
define( 'NONCE_KEY',        'OI Cz@1!3:B.m{=bm2Be%!kL<QqZdFj-6ZU0#U=f~<u=mjZ;~M;wLdbT1c,)}J.+' );
define( 'AUTH_SALT',        'z0ifrJ79BM@{|>>|ZYyR?]pbv[[(8%H.`sc4g$lkzDpN]Z))O,N,NipI]ezGM0~9' );
define( 'SECURE_AUTH_SALT', 'u(G&80f+OOX&`~/t PRZl&gvs9SLac[5huy9JqBn?.w?BU5XXv/NlAbxr9Vc)ZEs' );
define( 'LOGGED_IN_SALT',   'wm>8Z:`A|01}qhrPoQ&XjD!ZT)#y33!l9iqd?rE2wWUh5fF_Z^XLlWbUy6^P&b2}' );
define( 'NONCE_SALT',       ',-T<*?RRCiMd$#|wGKNOX$q](5SRUa@0,O|u%(Fz:I!Hj~|yQ/WnV:qaoG<<I]r|' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
