<?php

include('vendor/autoload.php');
include('routes.php');

session_start();
if(!file_exists('db.ini')){
    die('Il manque le fichier db.ini!');
}

$default_route = $routes['default'];
$route_parts = explode('/', $default_route);

$method = $_SERVER['REQUEST_METHOD'];
$a = isset($_REQUEST['a']) ? $_REQUEST['a'] : $route_parts[2];
$r = isset($_REQUEST['r']) ? $_REQUEST['r'] : $route_parts[1];

if (!in_array($method . '/' . $r . '/' . $a, $routes)) {
    die ('Ce que vous cherchez n’est pas ici');
}

$controller_name = 'Controllers\\' . ucfirst($r) . 'Controller';

// $container = new \Illuminate\Container\Container();
// $controller = $container->make($controller_name);

$controller = new $controller_name;

$data = call_user_func([$controller, $a]);


include('views/layout.php');
