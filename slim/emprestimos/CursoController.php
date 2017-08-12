<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class CursoController {

    public function lista(Request $request, Response $response) {
        $cursos = Bootstrap::getEntityManager()->getRepository("Curso")->findAll();
        return $response->withJson($cursos);
    }

    public function buscar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $curso = Bootstrap::getEntityManager()->find("Curso", $id);
        return $response->withJson($curso);
    }

    public function adicionar(Request $request, Response $response) {
        $json = json_decode($request->getBody());

        $curso = new Curso();
        $curso->setNome($json->nome);

        Bootstrap::getEntityManager()->persist($curso);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

    public function alterar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $json = json_decode($request->getBody());

        $curso = Bootstrap::getEntityManager()->find("Curso", $id);
        $curso->setNome($json->nome);

        Bootstrap::getEntityManager()->persist($curso);
        Bootstrap::getEntityManager()->flush();

        return $response;

    }

    public function excluir(Request $request, Response $response) {
        $id = $request->getAttribute("id");

        $curso = Bootstrap::getEntityManager()->find("Curso", $id);
        Bootstrap::getEntityManager()->remove($curso);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

}
