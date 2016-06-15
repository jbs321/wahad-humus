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
define('DB_NAME', 'wahad_humus');

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
define('AUTH_KEY',         ';)ES>Cuh<.dUk.O$)|!/_kUmzmYp5lzo,=d&*71Y<Etf;$:CoN];4!5C>%Dhs[b8');
define('SECURE_AUTH_KEY',  'fKbAt]b[8xU)^Q0Z=8Dk3|}_xPR6O&RP)Y=B~o&ZH<&+278fiK=vkMdqHXyisyy*');
define('LOGGED_IN_KEY',    '5x6n%A/0q=D)*n,vb3s-LcOA45LvInp@H92QmZM+!ev`Dx:!%wU7+Jw)C>5hnDgo');
define('NONCE_KEY',        '=zf`S!^o})O~rBU A$/2:sc6q4v-/{)}mdd|5=s b1 -}3srD<]oSzh&0Z[p9G)2');
define('AUTH_SALT',        'CKJML,d(m [CtLytW,YJu)[V.F&[1*rqxD6 ZG<VM>LG/$A`Kqqt`=-?Uo%LZw9M');
define('SECURE_AUTH_SALT', 'W-fY+XuR2k@hF?!txVt3G)3t@RHkOlE mquu1;58@zR@#Km$PAxdT_>u//pXuz#h');
define('LOGGED_IN_SALT',   'V)UC@<v6y@*Yqj/+F4z^<XFR}@>9QdCiR+AbqjY_&2$g]_rm#yBSr@6=#,nzi)bE');
define('NONCE_SALT',       'ZU t65}S;S@Lj-%CfJm 4S_d5a}y=kapsC. lN1P?|pDH,S^D&f0u/ID,lA%o78[');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
