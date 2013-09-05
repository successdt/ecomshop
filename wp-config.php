<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ecomshop');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '8cm=w;U9l!yyhr9S,/IC!aw}?119w1{PeG o1ZZ6CmWd%I A/NlloBLG)Ty2,^yr');
define('SECURE_AUTH_KEY',  'WC |v+8p >:[]xg4! M-yEO(iQXJd[z%<G<J8:Y=P]Uo]SOpfa)8}jzpZu X*~lb');
define('LOGGED_IN_KEY',    'tz?q<]P$X4k{7E#kKk2s-]Ma4 M%p]/H6l1FtWp-=6 Q1Mqcr/I5xK9YkGp<Fb,[');
define('NONCE_KEY',        'Yh!,5.i;8@jLV|A&qod]ynvA=n Q]brLM==qya {qLp^q%g5Fgft9+DTC]gt|{Zv');
define('AUTH_SALT',        'TRIGdsgw$J}h6{rcNe~&bL% _zA.Z- VCI5P4D|VcFZBO2qkJD=F,;~UYO;JN<m{');
define('SECURE_AUTH_SALT', '.H$k(=g+`Y?PlykFE2F86DR.[oDM%rGWM30]L7K{fpQtd$=R#MO042t9e%nEM*Vn');
define('LOGGED_IN_SALT',   '`qy4H)Y@YXF~dlYS6n%E?w-2GHdm^Hc$hLjvXV+?9Ds;JiHI)k~E}%@N5H<Z*WkF');
define('NONCE_SALT',       'o5-)4m-cfj.j([;dKZZB+o=X+?K!t&UuHn|QghZGx(L#AaW|738&g!]DUYn|q-{]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', 'vi');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
