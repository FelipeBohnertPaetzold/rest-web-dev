<?php

include_once '../../vendor/autoload.php';

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App();

$app->add(function(Request $request, Response $response, $next) {
    $response->write("Antes da Rota");
    //return $response->withStatus(403);
    $next($request, $response);
    $response->write("Depois da Rota");
    return $response;
});

$app->get("/", function(Request $request, Response $response) {
    return $response->write("Teste");
});

$app->run();
