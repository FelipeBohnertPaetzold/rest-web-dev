<?php

include_once '../vendor/autoload.php';

$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTUsIm5vbWUiOiJMdWl6IEhlbnJpcXVlIiwiZXhwIjoxNTAxMzM3ODgzfQ.vdY_KOvQtuYvm9HTWzMXBq83CBtD3zClwSrTGoJL1c8";

try {
    $jwtDecode = Firebase\JWT\JWT::decode($token, "webdev", array("HS256"));
    var_dump($jwtDecode);
} catch (Exception $exc) {
    echo "Token inválido!";
}





