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
define( 'DB_NAME', 'mysite' );

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
define( 'AUTH_KEY',         'MC+;ukha~x4CAe..ii|O)bMzH0{yPO;WWm]XP2K.0W^0*>i32eDii-AbRC`C3bF6' );
define( 'SECURE_AUTH_KEY',  '-9v:u!# oPvV E2.]3V5gP:4$8gi^&V>XHqq;h%k`T^G/iH#!VeAVPLAgq*TIhb+' );
define( 'LOGGED_IN_KEY',    '4h3eWZL7x6@UGR.T^tf@b,XoM:tOFdcQ-W[<,}rR/1)F^d?5KpG[+5-+V]N$9Ub@' );
define( 'NONCE_KEY',        'S_%y!jB,>:`IZZjL>*i7J%Ovdkh)wuk04kl[>[hRtkyb0G?k+%]Ln`)*7s}Q.S}0' );
define( 'AUTH_SALT',        'gRiVH #(y^Dpte,^]QK.ij$;THflj#6b-Ab}W&FvIW}:G#[V0qB~fW7>?uo,b%Gg' );
define( 'SECURE_AUTH_SALT', '^:&pCp0RvN^p#[Eb>zhlJ{ uZ^5Q#XX3/:6TckK$$|05A|A5<S6EpxE?EFE!MlYC' );
define( 'LOGGED_IN_SALT',   'tz3>>Kw7?Kz1*g!8NH`6r<o;aPM1eDU0={T2&aJ2EfqqlTp| -kasdNWGzY$LG[%' );
define( 'NONCE_SALT',       'F4-@Oi+4-fH?Fa@RZ}d+xl>2rBUJ2$UNN2D(!m6( ZCY21L VRN9,`5G;ZuBGCs?' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
