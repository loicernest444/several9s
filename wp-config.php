<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

define( 'ITSEC_ENCRYPTION_KEY', 'PTxacCNTQG9nJkFBOG47V086QU4qQiMxNW5TRTtBIThrQkJdZ3Q0IEpTbEtfS1FuJVs8fikwOGgzQT5rUT9fag==' );
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
* * Localized language
* * ABSPATH
*
* @link https://wordpress.org/support/article/editing-wp-config-php/
*
* @package WordPress
*/
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u798554933_B4hwn' );
/** Database username */
define( 'DB_USER', 'u798554933_vrFGv' );
/** Database password */
define( 'DB_PASSWORD', 'Wxua8x6Zj5' );
/** Database hostname */
define( 'DB_HOST', 'mysql' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
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
define( 'AUTH_KEY',          'TcvJ{vJPX]f2!G{xRsaDb;X1)KfrDk1EP@zy~(d$RBJN{E4W.4Ao;~<X}N}<[g*}' );
define( 'SECURE_AUTH_KEY',   'VU^wOJ:&pR++x>aQr&v4:W)5!hFL/;_L3Iv6SC-eku1;^0Vx>12i:V]>0_vvznsw' );
define( 'LOGGED_IN_KEY',     'a/ZyS]Z#>%9S?aQWI89iD.0 :v@N6in }A=wRf)E8?!Rbo&&*gG41&Nr!Kd,YD[`' );
define( 'NONCE_KEY',         'fk<G?7inWT}~dh%U[96jRB<bR4C=!tMY<)ex)GEU}c,v1B;G#i(DCN;/+d28;5-m' );
define( 'AUTH_SALT',         's!{e%/Oa(PkH!y hlwizszFUBV}L)8!lP2aztmYidF,`BEWIl-c*UdH-BJsCL*(#' );
define( 'SECURE_AUTH_SALT',  'r!7eLOvQ&^ar2kaD,tv80R<Tc1VaB}*IhGHrH#knr_^+KENAX3L!N[J(Kkt-jk7j' );
define( 'LOGGED_IN_SALT',    'Zn*D5;c`R.:e%Jl!C#OPPZrKoN9@Jbem`F[8t7SW1gE|xn%/)?n}$p)$dlHFz1^#' );
define( 'NONCE_SALT',        ')(x%G=%D 7iMyU(/%7+_]#PB=v&$=?<(ngjIdj/]-kLXCY#Um|WV7,UE_=F]yf;>' );
define( 'WP_CACHE_KEY_SALT', '#}t@>WWIiu#q*g>Zp^{j*+5,a@uZ(obyXS):^CfvV`25sDK,`rB.h5Q]t7@S;OB,' );
/**#@-*/
/**
* WordPress database table prefix.
*
* You can have multiple installations in one database if you give each
* a unique prefix. Only numbers, letters, and underscores please!
*/
$table_prefix = 's3olx_';
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
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
