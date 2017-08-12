<?php

include_once '../../vendor/autoload.php';

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App();

$app->get("/", function(Request $request, Response $response) {

    if ($request->hasHeader("token")) {
        $token = $request->getHeaderLine("token");
        if ($token == "123456") {
            return $response;
        }
    }

    return $response->withStatus(404, "Não encontrado!");
});

$app->run();
