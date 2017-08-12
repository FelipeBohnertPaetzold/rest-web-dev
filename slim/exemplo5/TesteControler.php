<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class TesteControler {

    public function lista(Request $request, Response $response) {
        return $response->write("Teste");
    }

}
