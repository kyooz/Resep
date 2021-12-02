<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\Router;
use app\controllers\ResepController;

$router = new Router();

// $router->get('/', [ResepController::class, 'index']);
// $router->get('/resep', [ResepController::class, 'index']);
// $router->get('/resep/create', [ResepController::class, 'create']);
// $router->post('/resep/create', [ResepController::class, 'create']);
// $router->get('/resep/update', [ResepController::class, 'update']);
// $router->post('/resep/update', [ResepController::class, 'update']);
// $router->post('/resep/delete', [ResepController::class, 'delete']);

$router->get('/', [new ResepController(), 'index']);
$router->get('/resep', [new ResepController(), 'index']);

$router->get('/resep/create', [new ResepController(), 'create']);
$router->post('/resep/create', [new ResepController(), 'create']);

$router->get('/resep/update', [new ResepController(), 'update']);
$router->post('/resep/update', [new ResepController(), 'update']);

$router->post('/resep/delete', [new ResepController(), 'delete']);

$router->get('/resep/baca', [new ResepController(), 'baca']);

$router->resolve();