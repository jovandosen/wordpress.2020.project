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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress2020' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ',l2U!uxpCi5x>R-v` bmdqOHmMViOS]~JY*Fe${[R>%id EenYRpK@}-GX=I+A]N' );
define( 'SECURE_AUTH_KEY',  '*Cy!zLYPCp0y+X{cA2lOYS`3,=J<UT?t4.gKW $].V=/PhuNlxGx;FQG1)$ -uwv' );
define( 'LOGGED_IN_KEY',    'Zk@hyoz=#,]3&3u^E%lH$r<~!qqdHA$DouHgq:eOL^jG83p@ 1#Js9-:k</ofDct' );
define( 'NONCE_KEY',        '~ 0JBF*mL4C{NWl$=@,u~)F001:2u|Ls!8A;I7G(*6KoPYb^1olh(]<Ia]nx(II5' );
define( 'AUTH_SALT',        '-Mbg;1sl=T]V86+^U(Y^,Pc2[=ATkbVAf!Nm6%RP^h3&QgaW,>C!$40d:k%VSK#7' );
define( 'SECURE_AUTH_SALT', 'wbmD+ESV f1U>Zf W8Nv59B[YF_<S=/T4GV1{6eH4S}bTK74nCRV9cYw6[=q2v-2' );
define( 'LOGGED_IN_SALT',   'g-./XO4jC)Sxyf#3VFFG&D)b}0k.r?`4chh4uJG3952t#OUt K=Jlp-aTDhc+0x#' );
define( 'NONCE_SALT',       'z]F/-Re:RO`iUqKrGqe)M/GRuZgjc.RTl3Wep*ZApiAs Ybv^#ht=ITV(%w`S9hH' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
