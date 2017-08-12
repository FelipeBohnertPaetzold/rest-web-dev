<?php

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Middleware {

    function middlewareToken(Request $request, Response $response, callable $next) {

        $urlsLiberadas = ["login/"];
        $path = $request->getUri()->getPath();

        if (!in_array($path, $urlsLiberadas)) {
            try {
                $token = $request->getHeaderLine("token");
                $objJWT = Firebase\JWT\JWT::decode($token, "webdev", array("HS256"));
            } catch (Exception $exc) {
                return $response->write("Token Inválido")->withStatus(401);
            }
        }

        $response = $next($request, $response);
        return $response;
    }

}
