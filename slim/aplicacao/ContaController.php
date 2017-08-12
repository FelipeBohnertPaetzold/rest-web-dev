<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ContaController {

    public function lista(Request $request, Response $response) {
        $contas = Bootstrap::getEntityManager()->getRepository("Conta")->findAll();
        return $response->withJson($contas);
        //GET http://localhost/Rest2017/slim/aplicacao/conta/
    }

    public function buscar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $conta = Bootstrap::getEntityManager()->find("Conta", $id);
        return $response->withJson($conta);
        //GET http://localhost/Rest2017/slim/aplicacao/conta/2
    }

    public function adicionar(Request $request, Response $response) {
        $json = json_decode($request->getBody());

        $agencia = Bootstrap::getEntityManager()->find("Agencia", $json->agencia->id);
        $cliente = Bootstrap::getEntityManager()->find("Cliente", $json->cliente->id);

        $conta = new Conta();
        $conta->setAgencia($agencia);
        $conta->setCliente($cliente);
        $conta->setLimite($json->limite);

        Bootstrap::getEntityManager()->persist($conta);
        Bootstrap::getEntityManager()->flush();

        return $response;

        //POST http://localhost/Rest2017/slim/aplicacao/conta/2 + JSON
    }

    public function alterar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $json = json_decode($request->getBody());

        $agencia = Bootstrap::getEntityManager()->find("Agencia", $json->agencia->id);

        $conta = Bootstrap::getEntityManager()->find("Conta", $id);
        $conta->setAgencia($agencia);
        $conta->setLimite($json->limite);
        $conta->setSituacao($json->situacao);

        Bootstrap::getEntityManager()->persist($conta);
        Bootstrap::getEntityManager()->flush();

        return $response;

        //PUT http://localhost/Rest2017/slim/aplicacao/conta/2 + JSON
    }

    public function excluir(Request $request, Response $response) {
        $id = $request->getAttribute("id");

        $conta = Bootstrap::getEntityManager()->find("Conta", $id);
        Bootstrap::getEntityManager()->remove($conta);
        Bootstrap::getEntityManager()->flush();

        return $response;

        //DELETE http://localhost/Rest2017/slim/aplicacao/conta/2
    }

}
