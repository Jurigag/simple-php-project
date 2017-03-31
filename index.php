<?php

require "IndexController.php";
require "View.php";
require "Router.php";

/**
 * EN: You should learn about composer autoloader
 * PL: Powinieneś zapoznać się z composer autoloader aby nie wpisywać require dla klas
 */

use Simpleproject\Router;

/**
 * EN: Just for example i set $_SESSION
 * PL: Dla przykładu ustawiam $_SESSION
 */
$_SESSION["auth"] = true;
$_SESSION["user"] = "admin";

$router = new Router(new \Simpleproject\View());
$router->handle($_SERVER['REQUEST_URI']);