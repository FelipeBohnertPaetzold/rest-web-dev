<?php

include_once '../../vendor/autoload.php';
include_once './TesteControler.php';



$app = new \Slim\App();

//$app->get("/", TesteControler::class . ":lista");

$app->get("/", "TesteControler:lista");
$app->run();
