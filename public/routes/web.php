<?php

use Core\Route;
use Controllers\Home;

require_once __DIR__ . '/../controllers/home_controller.php';

$web_router = new Route();

// Add routes here
$web_router->add('/', [Home::class, 'index']);
$web_router->add('/about', [Home::class, 'about']);
