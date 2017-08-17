<?php
define('FS_METHOD','direct');
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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'asic');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'jTBTaWD2yQ');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-f(|^DcM< e|wyjP)X}IB&al~++a#j2ZF>ira`SG^SfsBv@2O8knqi`=Nq2]>45j');
define('SECURE_AUTH_KEY',  'z!!Svt#%l/.45kD}<7cU|r{/?0GR%-bTn}+FlT]sLtG$|pppM)$[q?kcsu==L(U&');
define('LOGGED_IN_KEY',    '9H~h6hCrwGveZAaVa<0-LMuOl,YZu-<hXi.q)P_jgBd5ajBw1]-BA##n:e+Y8_-3');
define('NONCE_KEY',        'HHn>+*ET5]wC7~4N;4~J,/faDY]+`DY+L3i8h%_$|)+es+>-u`ru|Tn cz[.K(O4');
define('AUTH_SALT',        'd!witpnqc3h~b9>UkV,wC9]d+oT)7}3e`&^8{CTapKz,nyQ}:@K0!2j-1zWd|)MN');
define('SECURE_AUTH_SALT', 'y9k-(Gp:1wAI?>46ea5+Tc%-6{NND*%v{&Omd/W|tt{d:=AC~#%lD@Iy,S6ySz(C');
define('LOGGED_IN_SALT',   '{WnVHy-WBV$.%=Hiw]e)%Lf-ZRq+oYL^~G+x^=GvD$C=4|HzNe4YtS[]5-zIid]x');
define('NONCE_SALT',       '5-u+,?m+j+.,.V7T!&V5[x)}jX$340)$rs&w>hdT!.>&qk2WNevfi&spZR$3.T<Y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
