<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hospitalduran');

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
define('AUTH_KEY',         'poql5wbr7smgwdsifo0d81wm7zaubpihfuff5qnj6zphnd6rzlt7qc2680r56rsq');
define('SECURE_AUTH_KEY',  's8prtm5uefvcjotezwwlygmkfaurd1ccwxxgb2av9ict9s3hvjygfnud2yp3dqem');
define('LOGGED_IN_KEY',    'frdc4fzdqgd5trpqf7cdychq8hmyds3kmx6tlpsqjhh2evbzioqlhffvz4bqhwcz');
define('NONCE_KEY',        'yq7icyyl7dq5ugmih8nsb4zwuy2emtkoqoqizhqpd9lc42zrevsdg90nrv4oicte');
define('AUTH_SALT',        'vq9w4vtr2qibdasnbr75bumg59imoasuoytgn2mxp9ecvbxyn7fevybfn61wyg2v');
define('SECURE_AUTH_SALT', 'ccq5a6orwaxvm01wjier8g00owokj5fm5p8sa2lahrjguol5cyoyhfkg0rajvadl');
define('LOGGED_IN_SALT',   'ky9jma886cs3bkilm791a7sxbu6btvwtnnbrjn0xlxnhnewtxegbaffckxtisqpz');
define('NONCE_SALT',       'qsjv7qoxzzakwjdio4umsehrvhrwexz8l4dyboauhjcvyslmhkmyeliclc1ulxua');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
