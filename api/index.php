<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/core/Response.php';
require_once __DIR__ . '/../app/middlewares/AuthMiddleware.php';
require_once __DIR__ . '/../app/controllers/v1/UserController.php';
require_once __DIR__ . '/../app/controllers/v2/UserController.php';

$method = $_SERVER['REQUEST_METHOD'];
$url = $_GET['url'] ?? '';

$segments = explode('/', trim($url, '/'));
$version = $segments[0] ?? null;
$resource = $segments[1] ?? null;

if ($version === 'v1' && $resource === 'auth') {
    Response::json(["token"=>"secret123"]);
}
 //echo $resource;
//echo $version;

AuthMiddleware::handle();

if ($resource === 'users') {
    if ($version === 'v1') {
        (new UserControllerV1())->index();
    } elseif ($version === 'v2') {
        (new UserControllerV2())->index();
    }
}

Response::json(["message"=>"Route not found"], 404);
