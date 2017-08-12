<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AgenciaController {

    public function lista(Request $request, Response $response) {
        $agencias = Bootstrap::getEntityManager()->getRepository("Agencia")->findAll();
        return $response->withJson($agencias);
        //GET http://localhost/Rest2017/slim/aplicacao/agencia/
    }

    public function buscar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $agencia = Bootstrap::getEntityManager()->find("Agencia", $id);
        return $response->withJson($agencia);
        //GET http://localhost/Rest2017/slim/aplicacao/agencia/2
    }

    public function adicionar(Request $request, Response $response) {
        $json = json_decode($request->getBody());

        $banco = Bootstrap::getEntityManager()->find("Banco", $json->banco->id);

        $agencia = new Agencia();
        $agencia->setNome($json->nome);
        $agencia->setBanco($banco);

        Bootstrap::getEntityManager()->persist($agencia);
        Bootstrap::getEntityManager()->flush();

        return $response;
        
        //POST http://localhost/Rest2017/slim/aplicacao/agencia/2 + JSON
    }

    public function alterar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $json = json_decode($request->getBody());

        $agencia = Bootstrap::getEntityManager()->find("Agencia", $id);
        $agencia->setNome($json->nome);

        Bootstrap::getEntityManager()->persist($agencia);
        Bootstrap::getEntityManager()->flush();

        return $response;

        //PUT http://localhost/Rest2017/slim/aplicacao/agencia/2 + JSON
    }

    public function excluir(Request $request, Response $response) {
        $id = $request->getAttribute("id");

        $agencia = Bootstrap::getEntityManager()->find("Agencia", $id);
        Bootstrap::getEntityManager()->remove($agencia);
        Bootstrap::getEntityManager()->flush();

        return $response;

        //DELETE http://localhost/Rest2017/slim/aplicacao/agencia/2
    }

}
