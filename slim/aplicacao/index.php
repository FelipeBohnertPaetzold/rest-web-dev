<?php

include_once '../../vendor/autoload.php';
include_once './Bootstrap.php';
include_once './Cliente.php';
include_once './ClienteController.php';
include_once './Banco.php';
include_once './BancoController.php';
include_once './Agencia.php';
include_once './AgenciaController.php';
include_once './Conta.php';
include_once './ContaController.php';
include_once './Operacao.php';
include_once './OperacaoController.php';
include_once './LoginController.php';
include_once './Middleware.php';

$config = [
    'settings' => [
        'displayErrorDetails' => true
    ]
];

$app = new \Slim\App($config);

$app->add("Middleware:middlewareToken");

$app->post("/login/", "LoginController:login");

$app->group("/cliente", function() {
    $this->get("/", "ClienteController:lista");
    $this->get("/{id}", "ClienteController:buscar");
    $this->post("/", "ClienteController:adicionar");
    $this->put("/{id}", "ClienteController:alterar");
    $this->delete("/{id}", "ClienteController:excluir");
});

$app->group("/banco", function() {
    $this->get("/", "BancoController:lista");
    $this->get("/{id}", "BancoController:buscar");
    $this->post("/", "BancoController:adicionar");
    $this->put("/{id}", "BancoController:alterar");
    $this->delete("/{id}", "BancoController:excluir");
});

$app->group("/agencia", function() {
    $this->get("/", "AgenciaController:lista");
    $this->get("/{id}", "AgenciaController:buscar");
    $this->post("/", "AgenciaController:adicionar");
    $this->put("/{id}", "AgenciaController:alterar");
    $this->delete("/{id}", "AgenciaController:excluir");
});

$app->group("/conta", function() {
    $this->get("/", "ContaController:lista");
    $this->get("/{id}", "ContaController:buscar");
    $this->post("/", "ContaController:adicionar");
    $this->put("/{id}", "ContaController:alterar");
    $this->delete("/{id}", "ContaController:excluir");
});

$app->group("/operacao", function() {
    $this->post("/", "OperacaoController:adicionar");
});

$app->run();
