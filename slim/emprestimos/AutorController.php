<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AutorController {

    public function lista(Request $request, Response $response) {
        $autores = Bootstrap::getEntityManager()->getRepository("Autor")->findAll();
        return $response->withJson($autores);
    }

    public function buscar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $autor = Bootstrap::getEntityManager()->find("Autor", $id);
        return $response->withJson($autor);
    }

    public function adicionar(Request $request, Response $response) {
        $json = json_decode($request->getBody());

        $autor = new Autor();
        $autor->setNome($json->nome);

        Bootstrap::getEntityManager()->persist($autor);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

    public function alterar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $json = json_decode($request->getBody());

        $autor = Bootstrap::getEntityManager()->find("Autor", $id);
        $autor->setNome($json->nome);

        Bootstrap::getEntityManager()->persist($autor);
        Bootstrap::getEntityManager()->flush();

        return $response;

    }

    public function excluir(Request $request, Response $response) {
        $id = $request->getAttribute("id");

        $autor = Bootstrap::getEntityManager()->find("Autor", $id);
        Bootstrap::getEntityManager()->remove($autor);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

}
