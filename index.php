<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require "IndexController.php";
require "View.php";
require "Router.php";

/**
 * EN: You should learn about composer autoloader
 * PL: Powinieneś zapoznać się z composer autoloader aby nie wpisywać require dla klas
 */

use Simpleproject\IndexController;
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
$router->handle($_SERVER['REQUEST_URI'], "/simple-php-project");