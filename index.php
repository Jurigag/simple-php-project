<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require "Controllers/IndexController.php";
require "View.php";
require "Router.php";

/**
 * EN: You should learn about composer autoloader
 * PL: Powinieneś zapoznać się z composer autoloader aby nie wpisywać require dla klas
 */

use Simpleproject\Controllers\IndexController;
use Simpleproject\Router;
use Simpleproject\View;

/**
 * EN: Just for example i set $_SESSION
 * PL: Dla przykładu ustawiam $_SESSION
 */
$_SESSION["auth"] = true;
$_SESSION["user"] = "admin";

$router = new Router(new View());
$router->addRoute("/", [IndexController::class, "indexAction"]);
/**
 * EN: If you run for example from simple-php-project directory then your baseUri is /simple-php-project
 * PL: Jeśli uruchamiasz stronę z foldderu simple-php-project to wtedy twój baseUri to /simple-php-project
 */
echo $router->handle($_SERVER['REQUEST_URI'], "/simple-php-project");