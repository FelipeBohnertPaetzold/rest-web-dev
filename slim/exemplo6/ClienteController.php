<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ClienteController {

    public function lista(Request $request, Response $response) {
        return $response->withJson(SessionController::all("Cliente"));
    }

    public function buscar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        return $response->withJson(SessionController::get("Cliente", $id));
        //GET /exemplo6/cliente/1
    }

    public function adicionar(Request $request, Response $response) {
        $json = json_decode($request->getBody());
        $cliente = new Cliente($json->id, $json->nome, $json->idade, $json->email);
        SessionController::add("Cliente", $cliente);
        return $response;
    }

    public function alterar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $json = json_decode($request->getBody());
        $cliente = new Cliente($json->id, $json->nome, $json->idade, $json->email);
        SessionController::update("Cliente", $cliente, $id);
        return $response;
    }

    public function excluir(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        SessionController::delete("Cliente", $id);
        return $response;
    }

}
