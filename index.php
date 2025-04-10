<?php
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/core/Config.php';
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/core/Database.php';

$route = INITIAL_ROUTE;

$router = new Router();
$router->dispatch($route);
