<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class LivroController {

    public function lista(Request $request, Response $response) {
        $livros = Bootstrap::getEntityManager()->getRepository("Livro")->findAll();
        return $response->withJson($livros);
    }

    public function buscar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $livro = Bootstrap::getEntityManager()->find("Livro", $id);
        return $response->withJson($livro);
    }

    public function adicionar(Request $request, Response $response) {
        $json = json_decode($request->getBody());

        $autor = Bootstrap::getEntityManager()->find("Autor", $json->autor->id);
        $editora = Bootstrap::getEntityManager()->find("Editora", $json->editora->id);

        $livro = new Livro();
        $livro->setAutor($autor);
        $livro->setEditora($editora);
        $livro->setEdicao($json->edicao);
        $livro->setNome($json->nome);
        $livro->setPublicacao($json->publicacao);

        Bootstrap::getEntityManager()->persist($livro);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

    public function alterar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $json = json_decode($request->getBody());

        $livro = Bootstrap::getEntityManager()->find("Livro", $id);
        
        $autor = Bootstrap::getEntityManager()->find("Autor", $json->autor->id);
        $editora = Bootstrap::getEntityManager()->find("Editora", $json->editora->id);

        $livro->setAutor($autor);
        $livro->setEditora($editora);
        $livro->setEdicao($json->edicao);
        $livro->setNome($json->nome);
        $livro->setPublicacao($json->publicacao);

        Bootstrap::getEntityManager()->persist($livro);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

    public function excluir(Request $request, Response $response) {
        $id = $request->getAttribute("id");

        $livro = Bootstrap::getEntityManager()->find("Livro", $id);
        Bootstrap::getEntityManager()->remove($livro);
        Bootstrap::getEntityManager()->flush();

        return $response;
    }

}
