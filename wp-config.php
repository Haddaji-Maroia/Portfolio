<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'portfolio_maroia' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',         '[!I1g#*A!9Za@$g+X!!@#*Z(d^}A,Q81Pj:sPDu/QLNEsagSt8IfF#70X!|E*mHy' );
define( 'SECURE_AUTH_KEY',  'm]+C*}U`!u{hD oifB0Hy4692T`XxtY~n8&(f,v#8Fby1xXI6%L6,RGU#)+mSJ?h' );
define( 'LOGGED_IN_KEY',    '|K00L p}|ki0j28 1 =3i.sweU9a_1>z}FQ$I ||i=Iyje20`a*L-,<O]k>7F1$6' );
define( 'NONCE_KEY',        'P,Z XeD}KGGJ-XmMsnSckT}ZZullhoUR*svP&eHU&V#&I,CvUC5@&4#(W+2KYgv>' );
define( 'AUTH_SALT',        'Tx#QnR||qp9U%z|hr`M#E,(yos_4f^p-]8^<uZ0,SbRsofQ8JE>FJ0shp19c~oZ{' );
define( 'SECURE_AUTH_SALT', '[@E:Y3{efvD,7<R,s;s]qV(/E{/MEEj_mToj,Ls]W9.h9~zJ]1#n3k$X,(fppB7w' );
define( 'LOGGED_IN_SALT',   'wx`+C{BEKKlY> D[y{&}%xSa=><{*5Cn-^x;Zwig.ep?PKv!)t|_h$zgJ(>9-WLd' );
define( 'NONCE_SALT',       'HvkVC;CBJ`LlC5f})C^4E[4o=w<G9=,hEQe{6{ats%Qo8i; !e:j]T0JUq{[76SG' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
