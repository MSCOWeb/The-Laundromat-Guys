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
define('DB_NAME', 'lguys');

/** MySQL database username */
define('DB_USER', 'lguys');

/** MySQL database password */
define('DB_PASSWORD', 'waMG}]J$=38w');

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
define('AUTH_KEY',         'OdF:|D<hJZU(dj$:`,zWu_Nl9~|M>Zxmp@h.19&+c9h&wFRU9~$]&!&T`9)VG@rI');
define('SECURE_AUTH_KEY',  '.~Y=4-BAw3KrE<HzILY@|fv<-5h:NzEs570ur>&Yjnl>TYhFmBL .&f`GQ/Aplg@');
define('LOGGED_IN_KEY',    'H]7y))Ad_~+Z|W|}Yr@Un`;[gz{tx|F-%~Yv=Nl0y$NujRDbPz?xR,Ap9?W02I`i');
define('NONCE_KEY',        'dG=E/(E?LW!IIo@BE&f5XUB`JjW%GrR9}bxa+Isi!)0/74*o,g6Xu0H,a-i9Nv/=');
define('AUTH_SALT',        't|)5,[q$_/vp[DK|H1=PJz^XVtl,2aL;?$[ui#;d{Q.33A,jbbj!J~%DN !6>}{F');
define('SECURE_AUTH_SALT', 'e}gj|%l=I%9fJn%RZN2eO0Z7qPBLrb}A@>^w)39hJO-~N62_MfTGFW3ZT|Bb2K;f');
define('LOGGED_IN_SALT',   'jh]YdH??DlSSQ.rkGe9>t;UeG+Mb`3Gn-/a|unKPyf6qhDn)8[cos-PfvWGZ$0`E');
define('NONCE_SALT',       '~+r1!XC;WbtfMzwkIGf}37u[917~-~NymuUmD.|qJIE.OsEsU lJchT9-vIs6I|)');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tlg_';

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
