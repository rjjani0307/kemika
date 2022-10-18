<?php
define( 'WP_CACHE', true );


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
define( 'DB_NAME', 'u795941923_cQR7r' );

/** MySQL database username */
define( 'DB_USER', 'u795941923_NTrVj' );

/** MySQL database password */
define( 'DB_PASSWORD', 'fOWTeSy5xk' );

/** MySQL hostname */
define( 'DB_HOST', 'mysql' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'e,<aNbS07s`6J;|/-WY5y/%Q~!>!RHS.GoOtIx0WO[k*36^/}pLO~xgE.t3XJJe-' );
define( 'SECURE_AUTH_KEY',   'w*2}uAnZ:gPFlT$PA:U#dQ~49y! Og}qy18VUXLZ8Z*d=tqEpF$Kz+NN.`gh9[ q' );
define( 'LOGGED_IN_KEY',     '*~dGjn|y=WCe;/Z#X[IU+ R%?R)yxpb=reZQcS$(ib(Ym<RLOGnF}l*HN?<vuHmj' );
define( 'NONCE_KEY',         'B--L~OMa|gL3Y}Ys]h`iQj/?qgY`[sr81CF_4ip>^%Y,,}hW81?enro2HSkTadqs' );
define( 'AUTH_SALT',         '<J]VYk[dF v<@WZjPro?PcZ:i&7BI}M*Bzy<PS?t{oP0]swF.I/P~Ly3p^QAupU(' );
define( 'SECURE_AUTH_SALT',  'v8Pqdgk1QE/m&nF2-k}j}>q@*_{D$-M>wn~zhK>Z!.2,2rS6FmasxMP?m4+MZ7!,' );
define( 'LOGGED_IN_SALT',    '.(<|.|/+2)Jx]&/g&c<k?J7Z3YmDl%Y5eQc/QO_Qm@rfm.RBNiT;E^5Y?]w#8|Jd' );
define( 'NONCE_SALT',        'V,<eKYYOydD=h5iD4t%40Pqr!<!(PaMM@jrha^Xvd~^y1Q/PE9,A%q36e^TZ#-8]' );
define( 'WP_CACHE_KEY_SALT', 'BSDj}aaOeA]%DB^[iEqXK}1b7f.pD6o>Dd4M93adT]r}B0L88=#O>9jmXT392L*H' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
