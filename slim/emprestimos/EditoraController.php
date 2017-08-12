<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class EditoraController {

    public function lista(Request $request, Response $response) {
        $editoras = Bootstrap::getEntityManager()->getRepository("Editora")->findAll();
        return $response->withJson($editoras);
    }

    public function buscar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $editoras = Bootstrap::getEntityManager()->find("Editora", $id);
        return $response->withJson($editoras);
    }

    public function adicionar(Request $request, Response $response) {
        $json = json_decode($request->getBody());

        $editora = new Editora();
        $editora->setNome($json->nome);

        Bootstrap::getEntityManager()->persist($editora);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

    public function alterar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $json = json_decode($request->getBody());

        $editora = Bootstrap::getEntityManager()->find("Editora", $id);
        $editora->setNome($json->nome);

        Bootstrap::getEntityManager()->persist($editora);
        Bootstrap::getEntityManager()->flush();

        return $response;

    }

    public function excluir(Request $request, Response $response) {
        $id = $request->getAttribute("id");

        $editora = Bootstrap::getEntityManager()->find("Editora", $id);
        Bootstrap::getEntityManager()->remove($editora);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

}
