<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ClienteController {

    public function lista(Request $request, Response $response) {

        try {
            $clientes = Bootstrap::getEntityManager()->getRepository("Cliente")->findAll();
        } catch (Exception $exc) {
            return $response->withStatus(400, "Erro ao listar clientes!");
        }
        return $response->withJson($clientes);
//GET http://localhost/Rest2017/slim/aplicacao/cliente/
    }

    public function buscar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        try {
            $cliente = Bootstrap::getEntityManager()->find("Cliente", $id);
            if (!$cliente) {
                return $response->withStatus(400, "Cliente não encontrado");
            }
        } catch (Exception $exc) {
            return $response->withStatus(400, "Erro ao buscar cliente");
        }

        return $response->withJson($cliente);
//GET http://localhost/Rest2017/slim/aplicacao/cliente/2
    }

    public function adicionar(Request $request, Response $response) {
        $json = json_decode($request->getBody());

        try {
            $cliente = new Cliente();
            $cliente->setNome($json->nome);
            $cliente->setCpf($json->cpf);

            Bootstrap::getEntityManager()->persist($cliente);
            Bootstrap::getEntityManager()->flush();
        } catch (Exception $exc) {
            return $response->withStatus(400, "Erro inserir cliente!");
        }

        
        return $response;
//POST http://localhost/Rest2017/slim/aplicacao/cliente/ + JSON
    }

    public function alterar(Request $request, Response $response) {
        $id = $request->getAttribute("id");
        $json = json_decode($request->getBody());

        try {
            $cliente = Bootstrap::getEntityManager()->find("Cliente", $id);

            if (!$cliente) {
                return $response->withStatus(400, "Cliente não encontrado");
            }

            $cliente->setNome($json->nome);
            $cliente->setCpf($json->cpf);

            Bootstrap::getEntityManager()->persist($cliente);
            Bootstrap::getEntityManager()->flush();
        } catch (Exception $exc) {
            return $response->withStatus(400, "Erro alterar cliente!");
        }

        
        return $response;

//PUT http://localhost/Rest2017/slim/aplicacao/cliente/2 + JSON
    }

    public function excluir(Request $request, Response $response) {
        $id = $request->getAttribute("id");

        try {
            $cliente = Bootstrap::getEntityManager()->find("Cliente", $id);

            if (!$cliente) {
                return $response->withStatus(400, "Cliente não encontrado");
            }

            Bootstrap::getEntityManager()->remove($cliente);
            Bootstrap::getEntityManager()->flush();
        } catch (Exception $exc) {
            return $response->withStatus(400, "Erro ao excluir cliente!");
        }

        
        return $response;

//DELETE http://localhost/Rest2017/slim/aplicacao/cliente/2
    }

}
