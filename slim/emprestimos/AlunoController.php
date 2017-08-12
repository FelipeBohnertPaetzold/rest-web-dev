<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AlunoController {

    public function lista(Request $request, Response $response) {
        $alunos = Bootstrap::getEntityManager()->getRepository("Aluno")->findAll();
        return $response->withJson($alunos);
    }

    public function buscar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $aluno = Bootstrap::getEntityManager()->find("Aluno", $id);
        return $response->withJson($aluno);
    }

    public function adicionar(Request $request, Response $response) {
        $json = json_decode($request->getBody());

        $curso = Bootstrap::getEntityManager()->find("Curso", $json->curso->id);

        $aluno = new Aluno();
        $aluno->setCurso($curso);
        $aluno->setNome($json->nome);
        $aluno->setSituacao($json->situacao);

        Bootstrap::getEntityManager()->persist($aluno);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

    public function alterar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $json = json_decode($request->getBody());

        $aluno = Bootstrap::getEntityManager()->find("Aluno", $id);
        
        $curso = Bootstrap::getEntityManager()->find("Curso", $json->curso->id);

        $aluno->setCurso($curso);
        $aluno->setNome($json->nome);
        $aluno->setSituacao($json->situacao);

        Bootstrap::getEntityManager()->persist($aluno);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

    public function excluir(Request $request, Response $response) {
        $id = $request->getAttribute("id");

        $aluno = Bootstrap::getEntityManager()->find("Aluno", $id);
        Bootstrap::getEntityManager()->remove($aluno);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

}
