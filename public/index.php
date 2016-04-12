<?php

/**
 * Debut MVC, basado en MINI - an extremely simple naked PHP application
 * https://github.com/panique/mini/
 * 
 * @package Debut MVC
 * @author  Daniel Martínez <danmnez.me>
 * @link    https://github.com/DanMnez/Debut-MVC
 * @license http://opensource.org/licenses/MIT MIT License
 */

/**
 * Mantiene la ruta del proyecto en "/var/www/".
 * "DIRECTORY_SEPARATOR" añade una barra al final de la dirección.
 */
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

/**
 * Establece la carpeta del proyecto como "/var/www/application".
 */
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

/**
 * Autoload de Composer. Se encarga de la autocarga de clases, evitando incluir "includes".
 */
if (file_exists(ROOT . 'vendor/autoload.php')) {
    require ROOT . 'vendor/autoload.php';
}

/**
 * Carga la configuración general de la aplicación.
 */
require APP . 'config/config.php';

/**
 * Inicia la aplicación.
 * @var Application
 */
$app = new Application();
