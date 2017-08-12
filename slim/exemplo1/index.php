<?php

include_once '../../vendor/autoload.php';

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App();

//$app->response()->header("Content-type", "application/json");

$app->get("/", function(Request $request, Response $response) {
    return $response->write("Teste");
});

$app->get("/produto", function(Request $request, Response $response) {

    $produto = new stdClass();
    $produto->id = 12;
    $produto->nome = "Mouse sem fio";
    //return $response->write(json_encode($produto));
    return $response->withJson(($produto));
});


$app->post("/produto", function(Request $request, Response $response) {
    $produto = json_decode($request->getBody());
    return $response->write("Teste POST:" . $produto->nome);
});

$app->put("/produto/{id}", function(Request $request, Response $response) {
    $id = $request->getAttribute("id");
    $produto = json_decode($request->getBody());
    return $response
                    ->write("Teste PUT:" . $produto->nome)
                    ->write("- Id:" . $id);
});

$app->delete("/produto/{id:[0-9]+}", function(Request $request, Response $response) {
    $id = $request->getAttribute("id");
    return $response->write("Teste DELETE:" . $id);
});

$app->get("/teste/{cpf:[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}}", function(Request $request, Response $response) {
    $cpf = $request->getAttribute("cpf");
    return $response->write("CPF:" . $cpf);
});

$app->get("/teste/{cpf:[0-9]{11}}", function(Request $request, Response $response) {
    $cpf = $request->getAttribute("cpf");
    return $response->write("CPF 2:" . $cpf);
});

$app->group("/cliente", function() {

    $this->get("/", function(Request $request, Response $response) {
        return $response->write("GET Cliente");
    });

    $this->post("/", function(Request $request, Response $response) {
        return $response->write("POST Cliente");
    });

    $this->put("/{id}", function(Request $request, Response $response) {
        return $response->write("PUT Cliente");
    });
});



$app->run();
