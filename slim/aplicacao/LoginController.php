<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class LoginController {

    function login(Request $request, Response $response) {
        $json = json_decode($request->getBody());

        if ($json->usuario == "admin" && $json->senha == "admin") {
            $objJWT = new stdClass;
            $objJWT->uid = "admin";
            $objJWT->exp = time() + 120;

            $token = Firebase\JWT\JWT::encode($objJWT, "webdev");
            return $response->write($token);
        } else {
            return $response->write("Dados inválidos")->withStatus(403);
        }
    }

}
