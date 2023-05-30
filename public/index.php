<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once __DIR__ . '/core/bootstrap.php';

require_once __DIR__ . '/routes/web.php'; // $web_router

$router = new Core\Router();
$router->register($web_router);
$router->lookup();
