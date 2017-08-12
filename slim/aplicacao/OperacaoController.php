<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class OperacaoController {

    public function lista(Request $request, Response $response) {
        $operacaos = Bootstrap::getEntityManager()->getRepository("Operacao")->findAll();
        return $response->withJson($operacaos);
        //GET http://localhost/Rest2017/slim/aplicacao/operacao/
    }

    public function adicionar(Request $request, Response $response) {
        $json = json_decode($request->getBody());

        $conta = Bootstrap::getEntityManager()->find("Conta", $json->conta->id);

        $operacao = new Operacao();
        $operacao->setTipo($json->tipo);
        $operacao->setValor($json->valor);
        $operacao->setConta($conta);

        Bootstrap::getEntityManager()->persist($operacao);
        Bootstrap::getEntityManager()->flush();
        
        return $response;
        //POST http://localhost/Rest2017/slim/aplicacao/operacao/ + JSON
    }

}
