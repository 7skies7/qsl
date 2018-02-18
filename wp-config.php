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
define('DB_NAME', 'qsl');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         ']cUh+I[)Cg{iNS*4omvH2_P(NQQt{`ilw]c0Yd@z_9<)dkuDX`bKsl7B@*J[V1<-');
define('SECURE_AUTH_KEY',  'KG G%xmY/7Q60uz;EhI:><bYq}sqLyv(62s,H:D#-(Q(}$d|!Bu$k1IYVO_T$3oX');
define('LOGGED_IN_KEY',    'n;tnYI{a&1M}G^9^{tsuI%eoCh^$2,mOf1[APBL8/ z9[kV}knA.yT1+=0WF7~4.');
define('NONCE_KEY',        'n*d$c(%ki18Dz~4l=~U0c88yacyaF3&aUA&`0B$+YzAXF^f.r hRO~dwN[E<fcWE');
define('AUTH_SALT',        ';u-eAFki{aN<.L[2B+)@-zagtVnb~YBo&gUf0{l,%_brFv]l=As87-*p9YGYN{-u');
define('SECURE_AUTH_SALT', 'D lekn`O^]{/*00Md,D;]F,W#J[2s|(jOwhj=P]GC.nviRf0?Ewy+k7EKDcQ 5Iy');
define('LOGGED_IN_SALT',   'mW16ebH 6r:8q;&8eB|qEP>8ks{,~e6mX;EGBFl x|6==WsGHD@u?U_D8ZpmxBr4');
define('NONCE_SALT',       'uU^HVX9;ml`nU}~NN1,fFH/)Koa(fNnbBfs_jbh)~e?=Ln7V.[R+F;QI[Z}U||s ');

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
