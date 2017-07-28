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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db_html5games');

/** MySQL database username */
define('DB_USER', 'user_html5games');

/** MySQL database password */
define('DB_PASSWORD', 'pw_html5g@m3s!');

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
define('AUTH_KEY',         ')I]?B)7BDtboNxoBfn:kLPC?6&ov5Y:~mUncO^7%i-%QdraE,u{aCV30?y$K}zms');
define('SECURE_AUTH_KEY',  'tE=qGCqCY~:(!zr5Ygm&fPqr[rVa0 1$x)B~cz<EWL/pT{mDJ50kVf,guoQ8,t<r');
define('LOGGED_IN_KEY',    'pAFC*%=7l++[.$Kn|+.AB*{[Ej40N!31`_E1jqVpHXC0g9q-gbolOOX3!W=aS/61');
define('NONCE_KEY',        '.I0I-KP)%qt gSY?R`NlJq.jd<i=)zG7.4ZHru;];MPIWPZr.h53SW~lAv9gra1u');
define('AUTH_SALT',        ')w!J([kOBeU?9p%PBoRBPuFTtE0-x`b@_6YK3.C>]{ b$aM(|T6xBu46{Q$X/GDS');
define('SECURE_AUTH_SALT', 'nuUznnzhSqyV ;)SH6]mr+*Zjqd2M,J5%mGa$}jU{1<3.soMP{mg{9!mB2Yicr.S');
define('LOGGED_IN_SALT',   'PP-uqq~yH]0{xi+a*;B@8^h}/w0`Q&5!Xt-~LC*_OIzj`a|7ZbdrGY3^#H7_i2MJ');
define('NONCE_SALT',       '{][r.erana o0z`(o s8?yJr]60KJsXZ.HBz>^+K:&e{S!~sVR-F^mqMo9+_c>]P');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ggames_';

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
