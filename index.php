<?php
/**
 * Created by PhpStorm.
 * User: mmoujahid
 * Date: 30/11/2016
 * Time: 09:58
 */

require_once 'autoloader.php';
Autoloader::register();


use Controllers\Router;

$router = new Router();
session_start();
$router->routeRequest();