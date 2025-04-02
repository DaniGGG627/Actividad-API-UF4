<?php
require 'src/http/Request.php';
require 'src/http/Response.php';
require 'src/Router.php';
require 'src/controllers/UserController.php';  

$request = new Request();
$response = new Response();

$router = new Router('routes.json');
$router->dispatch($request, $response);
