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

/*
 * cPanel & WHM® Site Software
 *
 * Core updates should be disabled entirely by the cPanel & WHM® Site Software
 * plugin, as Site Software will provide the updates.  The following line acts
 * as a safeguard, to avoid automatically updating if that plugin is disabled.
 *
 * Allowing updates outside of the Site Software interface in cPanel & WHM®
 * could lead to DATA LOSS.
 *
 * Re-enable automatic background updates at your own risk.
 */
define( 'WP_AUTO_UPDATE_CORE', false );

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'toitulam_db');

/** MySQL database username */
define('DB_USER', 'toitulam_wp');

/** MySQL database password */
define('DB_PASSWORD', 'GoQRpbcYDRwI');

/** MySQL hostname */
define('DB_HOST', 'mysql06.dotvndns.vn');

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
define('AUTH_KEY',         '9FR50KKnAArdeQfSjf4vO5gnLuc9_c8FEyXlKFuORZD7UWl9ZBJnTcrNAGkc9WS1');
define('SECURE_AUTH_KEY',  'Iyc6BsECmDVWMmC0l8NFzlI4ZKBfqLQlXXEzIErrYPeQW9AzYk44iEqwf4H9IxRT');
define('LOGGED_IN_KEY',    'WeUSaX9by7ssm2IO9vNvoJ6vD_XuId8mDTF6vAF0iPj8oZ5amm3oThAxfIZ0no6a');
define('NONCE_KEY',        'wKCbYbjMVY8mJgp8fk2A_rI6mXQgpTqTo3SMY4WWD6Dd66mdhHojnCwgSJxIXTrW');
define('AUTH_SALT',        'wAK79IoUeAp5F0S7ItfeyAiCH0sW0ZeE9hmRnAvHS9E5Qy0AaSbHmpLqCXJxromq');
define('SECURE_AUTH_SALT', 'xZgy6uLUxL_QRk6WveOOsjKBGBm3Lndw6ipNb1fiNsB3Mryy8AKH1kooCKkZlEro');
define('LOGGED_IN_SALT',   'GNZkHqxwZDq8qUcxdrYtA2FhFM9qdj5TxpgaWMa4pd77mDGXg0hgbiBHhVvOouey');
define('NONCE_SALT',       'QaQvQ211meDqG_lnV_aQqvn0PZc_wBKXcXN4W7GbdrKJURK9OXU7ljcS7NAyPglf');

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
