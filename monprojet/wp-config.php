<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '*qZgK%>-xs;SRrhDE/ck?zkkE?b.X(cjuD_)FCU]?D1NWLQ}oD}1(o&]ag!(tYXh' );
define( 'SECURE_AUTH_KEY',  ').+{A2HIsoR&dpWK4bST;:e~o0B3Ki?*MRwyrSa<Wt(c_?&3x5xFWeB;eI2H6Mh0' );
define( 'LOGGED_IN_KEY',    'RF><&h*`BI6W U5N*SP&cvd+=CjGU(3u_vH.;~Kdp.{$R;8EpQR47LB~3qQ0s4=@' );
define( 'NONCE_KEY',        ')A}^rta 0><t-ukY| 83]n(cGg+M4WAfT&Owgb*[>Kf4f,uUkx5XKEM;,3dj^a4b' );
define( 'AUTH_SALT',        '&+IS%K5G#uG2Gbm{(Stq%a=4%! [6h6e~1wSoZQ{ NM{X@;bZ^(:S08d7^r[_^b}' );
define( 'SECURE_AUTH_SALT', '@<^OJ/=Yj>yu-G8fk0EWa:[xSn4:g/t>k<9K pg$o6H}h=#_ #A&zh/h}>5SK9z<' );
define( 'LOGGED_IN_SALT',   '-cG>J$aZNDw})Hl:&8^frE-ag3:q<CUw-ItfV<mkInG,8DA$?~z,sQ#N<#SL7fM1' );
define( 'NONCE_SALT',       'Om]37kkd!*RNNzOc>~1PgG8<UPIXrIydA>oHiTR^0|FlLXHq+&L=g~|L#WgV/_XH' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
