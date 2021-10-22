<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'carrassi' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'DrK%_I89564k.7<b.Sf{t{DO0kbD5CcrYO#%2Bpn1/ZA]*K9lV}}DX V{u6]rw6x' );
define( 'SECURE_AUTH_KEY',  'cnIR0<=2/D@Pi`^OlDiD6X)7+v?D(5:9H},vTexDy[s R3-*&c8u?4*6UMki5T}?' );
define( 'LOGGED_IN_KEY',    ' 26HCU]_i^-So&3ABC6Q_w@0K;#XaN~v{/xbWzj~} FD&OhO}o@Q8Yi9 ~yP^#w^' );
define( 'NONCE_KEY',        ']uzd)8jR)e8v76RqS_CHFVz2aRU2?gYchSRF9::SmC}*8KNj+=(,(4?<8C05gTvH' );
define( 'AUTH_SALT',        'SCdW~xgpJ{Nr 4hJP?AY+!}+W@Z&J>w$WHc_Df;T4-+{1:WdmW9Vu!K!1B[jiTHr' );
define( 'SECURE_AUTH_SALT', 'dVQWMK{o(l!fKb)stu*X_:~ij_*pGWV2~hCb*(Tqvq,Sr>N|(3I#`M3VDoyL>&O8' );
define( 'LOGGED_IN_SALT',   '&6M.-.$_|mn=.l?|hMqpmpaevCr;d#[`A1pp5q8IVcb[fQ>jsD^Rb6Rdu!G~((!A' );
define( 'NONCE_SALT',       'ruQs8_`dbH2cq0/:rQ8FMC80V$.>/72@gBmkJ+MZ^6O.gh]%QjG^=DDls8&C-L>i' );

/**#@-*/

/**
 * WordPress database table prefix.
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

/* Add any custom values between this line and the "stop editing" line. */


// Enable WP_DEBUG mode
define('WP_DEBUG', true);

// Enable Debug logging to the /wp-content/debug.log file
define('WP_DEBUG_LOG', true);

// Disable display of errors and warnings
define('WP_DEBUG_DISPLAY', true);
@ini_set('display_errors',1);

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define('SCRIPT_DEBUG', true);


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
