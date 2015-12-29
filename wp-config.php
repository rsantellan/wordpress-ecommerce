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
define('DB_NAME', 'valentina1');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'NCrQ2umtyzAMso9gNnxtDWKdqLKOn7dX93klM3a08iN1z64W8nzN1Zu9OcI2Km1b');
define('SECURE_AUTH_KEY',  'rGixX2txNwwgWEOH5Nygy6kzgKJNo87E7PDPGcAL8MGwWwBedUSzc5e0Qxq7Kbg4');
define('LOGGED_IN_KEY',    '2mL8gPT6JZEvSq4zpI3dty8JtleS6KX7OnOFuwLzjcfieEhGa0DVOB6B22NiRmIp');
define('NONCE_KEY',        'WmTjTLAOOINAM4TbCcdd7YDHUrsJ3mgtaaADS61fV13cOlxUhnd9Ayk0rAOEVF84');
define('AUTH_SALT',        'EVNYpIGWtyaYKMknbT43fyNBP81FmeWjNlFx0WSFVbdmw4AcqfCp3c6WsABYFfps');
define('SECURE_AUTH_SALT', 'i6Nb85oFVe2AvuwTuHY8VSuby94Up3BjsKOCoN3sj8dgkVqhubCmkMwHUMXZHqEz');
define('LOGGED_IN_SALT',   'jOldZ06uyl1OUijHhqlMselbahaDIHmAiiF4VIExAgY2oij8OSEf6VVOUGIIZB18');
define('NONCE_SALT',       '9XxImyUsYqtO2b4Rswv63IEwvs3kVgrvr7wqloz6GfCSAngkyZQZk6mQVaxLUpKb');

/**
 * Other customizations.
 */
define('FS_METHOD','direct');define('FS_CHMOD_DIR',0755);define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');

/**
 * Turn off automatic updates since these are managed upstream.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);


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

democontent.define('WP_MEMORY_LIMIT', '500M');

define('WP_MEMORY_LIMIT', '3000M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
