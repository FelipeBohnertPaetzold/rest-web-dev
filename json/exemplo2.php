<?php

$objetos = array();

$objeto = new stdClass();
$objeto->id = 10;
$objeto->nome = "Luiz Henrique";
$objetos[] = $objeto;

$objeto = new stdClass();
$objeto->id = 15;
$objeto->nome = "Maria da Silva";
$objetos[] = $objeto;

echo json_encode($objetos);
