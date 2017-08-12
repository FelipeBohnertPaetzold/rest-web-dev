<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class EmprestimoController {

    public function lista(Request $request, Response $response) {
        $emprestimos = Bootstrap::getEntityManager()->getRepository("Emprestimo")->findAll();
        return $response->withJson($emprestimos);
    }

    public function buscar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $emprestimo = Bootstrap::getEntityManager()->find("Emprestimo", $id);
        return $response->withJson($emprestimo);
    }

    public function adicionar(Request $request, Response $response) {
        $json = json_decode($request->getBody());

        $aluno = Bootstrap::getEntityManager()->find("Aluno", $json->aluno->id);
        $livro = Bootstrap::getEntityManager()->find("Livro", $json->livro->id);

        $emprestimo = new Emprestimo();
        $emprestimo->setAluno($aluno);
        $emprestimo->setLivro($livro);
        $emprestimo->setDataEmprestimo(new DateTime($json->dataEmprestimo));
        $emprestimo->setDataPrevista(new DateTime($json->dataPrevista));

        Bootstrap::getEntityManager()->persist($emprestimo);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

    public function alterar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $json = json_decode($request->getBody());

        $emprestimo = Bootstrap::getEntityManager()->find("Emprestimo", $id);
        
        $aluno = Bootstrap::getEntityManager()->find("Aluno", $json->aluno->id);
        $livro = Bootstrap::getEntityManager()->find("Livro", $json->livro->id);

        $emprestimo->setAluno($aluno);
        $emprestimo->setLivro($livro);
        $emprestimo->setDataEmprestimo(new DateTime($json->dataEmprestimo));
        $emprestimo->setDataPrevista(new DateTime($json->dataPrevista));
        $emprestimo->setDataDevolucao(new DateTime($json->dataDevolucao));
        $emprestimo->setMulta($json->multa);


        Bootstrap::getEntityManager()->persist($emprestimo);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

    public function excluir(Request $request, Response $response) {
        $id = $request->getAttribute("id");

        $emprestimo = Bootstrap::getEntityManager()->find("Emprestimo", $id);
        Bootstrap::getEntityManager()->remove($emprestimo);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

}
