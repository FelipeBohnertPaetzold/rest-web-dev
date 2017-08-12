<?php

include_once '../../vendor/autoload.php';

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App();

$app->get("/gerar", function(Request $request, Response $response) {
    $objJWT = new stdClass();
    $objJWT->id = 15;
    $objJWT->nome = "Luiz Henrique";
    $objJWT->exp = time() + 60;

    $token = Firebase\JWT\JWT::encode($objJWT, "webdev");
    return $response->write($token);
});

$app->get("/validar", function(Request $request, Response $response) {

    try {
        $token = $request->getHeaderLine("token");
        $jwtDecode = Firebase\JWT\JWT::decode($token, "webdev", array("HS256"));
    } catch (Exception $exc) {
        $response = $response->withStatus(403);
    }
    return $response;
});


$app->run();
