<?php

include_once '../../vendor/autoload.php';
include_once './Cliente.php';
include_once './SessionController.php';
include_once './ClienteController.php';

$app = new \Slim\App();

$app->group("/cliente", function() {
    $this->get("/", "ClienteController:lista");
    $this->get("/{id}", "ClienteController:buscar");
    $this->post("/", "ClienteController:adicionar");
    $this->put("/{id}", "ClienteController:alterar");
    $this->delete("/{id}", "ClienteController:excluir");
});

$app->run();
