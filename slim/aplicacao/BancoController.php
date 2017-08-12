<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class BancoController {

    public function lista(Request $request, Response $response) {
        $bancos = Bootstrap::getEntityManager()->getRepository("Banco")->findAll();
        return $response->withJson($bancos);
        //GET http://localhost/Rest2017/slim/aplicacao/banco/
    }

    public function buscar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $banco = Bootstrap::getEntityManager()->find("Banco", $id);
        return $response->withJson($banco);
        //GET http://localhost/Rest2017/slim/aplicacao/banco/2
    }

    public function adicionar(Request $request, Response $response) {
        $json = json_decode($request->getBody());

        $banco = new Banco();
        $banco->setNome($json->nome);

        Bootstrap::getEntityManager()->persist($banco);
        Bootstrap::getEntityManager()->flush();

        return $response;
        //POST http://localhost/Rest2017/slim/aplicacao/banco/ + JSON
    }

    public function alterar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $json = json_decode($request->getBody());

        $banco = Bootstrap::getEntityManager()->find("Banco", $id);
        $banco->setNome($json->nome);

        Bootstrap::getEntityManager()->persist($banco);
        Bootstrap::getEntityManager()->flush();

        return $response;

        //PUT http://localhost/Rest2017/slim/aplicacao/banco/2 + JSON
    }

    public function excluir(Request $request, Response $response) {
        $id = $request->getAttribute("id");

        $banco = Bootstrap::getEntityManager()->find("Banco", $id);
        Bootstrap::getEntityManager()->remove($banco);
        Bootstrap::getEntityManager()->flush();

        return $response;

        //DELETE http://localhost/Rest2017/slim/aplicacao/banco/2
    }

}
