<?php

include_once '../vendor/autoload.php';

$objJWT = new stdClass();
$objJWT->id = 15;
$objJWT->nome = "Luiz Henrique";
$objJWT->exp = time() + 5;

$token = Firebase\JWT\JWT::encode($objJWT, "webdev");

echo $token;