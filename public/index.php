<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once __DIR__ . '/core/bootstrap.php';

// require_once __DIR__ . '/routes/web.php'; // $web_router

// $router = new Core\Router();
// $router->register($web_router);
// $router->lookup();

$site_dir = __DIR__ . '/site';
$request_uri = $_SERVER['REQUEST_URI'];
$is_api_route = str_starts_with($request_uri, '/api');
$search_uri = $is_api_route ? preg_replace('/^\/api/', "", $request_uri) : $request_uri;
$route_filename = $is_api_route ? 'api.php' : 'page.php';

$routes = Core\crawl_site_directory($site_dir);

$direct_route = array_search($search_uri, $routes, true);

// var_dump($routes);
// var_dump($request_uri);
// var_dump($search_uri);
// var_dump($is_api_route);
// var_dump($direct_route !== FALSE);

if ($direct_route !== FALSE) {
  require_once($site_dir . $routes[$direct_route] . DIRECTORY_SEPARATOR . $route_filename);
}
