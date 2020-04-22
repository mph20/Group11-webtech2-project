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
define( 'DB_NAME', 'id13233801_wp_d92fc206814290a62dbcffc7b28a629f' );

/** MySQL database username */
define( 'DB_USER', 'id13233801_wp_d92fc206814290a62dbcffc7b28a629f' );

/** MySQL database password */
define( 'DB_PASSWORD', 'c8cd956cc4ec4ecbffc5e3fb5d512bb17d1714af' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define( 'WP_DEBUG', true );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '|}Rc(GqM2.:2hD)Y26EZ%Mgt!2BgoN2=68<;N@Fk,s%bRp1h$NaV-;duuhky-RV/' );
define( 'SECURE_AUTH_KEY',   'Vj6</9mi-l)$Zn=sAMR]z^( }fx73Ecovd_oP>+sC@ ~mzNK{(F6N77 fLxa3wi1' );
define( 'LOGGED_IN_KEY',     '@/yM~H`$lfBU7]<#Bs6SDG4cQnU+>LcC,.|T@n0s_M[Gii6)2VV(g<wvmI1+RkYi' );
define( 'NONCE_KEY',         'sQ0g$th1uh*Q4Gmm_Yh4=y5zZE&CwP*?kXt@<O-=tb${p:+UzBj4`E3NZ1B*SCGO' );
define( 'AUTH_SALT',         '!1Fp!hDs$L<7jXSmowRN>ukSMw3,h3z[&zI)F(G <477d-4WfMZ%8OD:ZV|?dbCa' );
define( 'SECURE_AUTH_SALT',  '1.w4` ]so9G;PWn:tlV)^{f-IK;dy<hW?GPCt==y|B,[:]Ra1hbFfhPF|J@m,vir' );
define( 'LOGGED_IN_SALT',    'y7`LsI7YhWtli69cwsS?=H>xR!s#Bfr8,b|T.wi,+T*y]qNFhhQ==-#ni[hScd.:' );
define( 'NONCE_SALT',        '~-S_`~;ytYL.zv=Pg&-RB5Q3iG+t`::_tRHyakvyvhmL^J!}g)XPCg,8_d;E(/Wp' );
define( 'WP_CACHE_KEY_SALT', '7uFb_yCj,bDBrh]Tmz#>6Q`oNapZ_j>u#r[2uOQgnd=lk@CzVVM}Gud{e7PLBF-9' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
