<?php

/**
 * Configuración de la App.
 *
 * @see http://php.net/manual/en/function.define.php
 */

/**
 * Informe de errores.
 * útil para mostrar los pequeños problemas durante el desarrollo.
 */

define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

/**
 * Configuración de la URL.
 *
 * URL_PUBLIC_FOLDER:
 * Se trata de la carpeta pública, a la cual tienen acceso todo el mundo. No ocurre lo mismo con /application
 *
 * URL_PROTOCOL:
 * El tipo de protocolo a usar.
 *
 * URL_DOMAIN:
 * El dominio (la IP) que estamos usando.
 *
 * URL_SUB_FOLDER:
 * Las subcarpetas.
 *
 * URL:
 * Es la URL final, combinando las demás constantes (protocolo, dominio y subcarpetas).
 */

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

/**
 * Configuración de la base de datos.
 * Definimos las constantes para la base de datos (tipo, host, nombre, usuario, contraseña y codificación).
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'dbdebut');
define('DB_USER', 'root');
define('DB_PASS', '123');
define('DB_CHARSET', 'utf8');
