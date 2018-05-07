<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'agrorumdb2015');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'agrorumdb2015');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'Tierra2015!');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'agrorumdb2015.db.12378377.hostedresource.com');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '|FdX0_%Tu|TJ~AX)[Vw9X/=xa&yjxkp*]vQGH|mK:C*HhQms~>Xn#O^(Tggokwa!');
define('SECURE_AUTH_KEY', '{f@sp-c-0XXk2u$J`}IBAPrATD4-:l1*}1:w>mas4B-z{N~^6+G |hQ=.*#N*:l0');
define('LOGGED_IN_KEY', 'Yg=.Rd %}&<I*m](ZL|_gKOn#L$+xX>MsIQr~2I.*CPD#+0*[px0P-ttAb~K!~D1');
define('NONCE_KEY', '9Vn?~4gd?|, 01}-6LTa|u&(N9d|O0y@r38[2[%+0C7w-n<(-Y Do@Y<B-!Xm<X(');
define('AUTH_SALT', 'J~Exxe$AuMst9oN]+B9BupV>*S>e`Y#V]`sb-n~O.p8da@[i>yXbs=%+;#3}|-Bc');
define('SECURE_AUTH_SALT', 't}=FY)n}KS+X*5!iaQr{GAx <sHaA?7>RP>+,j%GX^dT^ @^I)m(!lBA`=51M)p2');
define('LOGGED_IN_SALT', '6]}[p!qv L4MwgD-h/~Ct*B^po7JI<TLCfL-x$A+2Ag`SJ5O{m/A}v.ga3gN-q^[');
define('NONCE_SALT', 'uv(cvy-LxFiBK<3Ke-pkM$|[*}qc9m-L=,vd-6m%S2/Bk9i_U8PIF:D$l9K)H[YE');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
