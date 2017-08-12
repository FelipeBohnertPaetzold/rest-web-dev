<?php

include_once '../../vendor/autoload.php';
include_once './Bootstrap.php';
include_once './Autor.php';
include_once './AutorController.php';
include_once './Curso.php';
include_once './CursoController.php';
include_once './Editora.php';
include_once './EditoraController.php';
include_once './Livro.php';
include_once './LivroController.php';
include_once './Aluno.php';
include_once './AlunoController.php';
include_once './Emprestimo.php';
include_once './EmprestimoController.php';

$config = [
    'settings' => [
        'displayErrorDetails' => true
    ]
];

$app = new \Slim\App($config);

$app->group("/autor", function() {
    $this->get("/", "AutorController:lista");
    $this->get("/{id}", "AutorController:buscar");
    $this->post("/", "AutorController:adicionar");
    $this->put("/{id}", "AutorController:alterar");
    $this->delete("/{id}", "AutorController:excluir");
});

$app->group("/curso", function() {
    $this->get("/", "CursoController:lista");
    $this->get("/{id}", "CursoController:buscar");
    $this->post("/", "CursoController:adicionar");
    $this->put("/{id}", "CursoController:alterar");
    $this->delete("/{id}", "CursoController:excluir");
});

$app->group("/editora", function() {
    $this->get("/", "EditoraController:lista");
    $this->get("/{id}", "EditoraController:buscar");
    $this->post("/", "EditoraController:adicionar");
    $this->put("/{id}", "EditoraController:alterar");
    $this->delete("/{id}", "EditoraController:excluir");
});

$app->group("/livro", function() {
    $this->get("/", "LivroController:lista");
    $this->get("/{id}", "LivroController:buscar");
    $this->post("/", "LivroController:adicionar");
    $this->put("/{id}", "LivroController:alterar");
    $this->delete("/{id}", "LivroController:excluir");
});

$app->group("/aluno", function() {
    $this->get("/", "AlunoController:lista");
    $this->get("/{id}", "AlunoController:buscar");
    $this->post("/", "AlunoController:adicionar");
    $this->put("/{id}", "AlunoController:alterar");
    $this->delete("/{id}", "AlunoController:excluir");
});

$app->group("/emprestimo", function() {
    $this->get("/", "EmprestimoController:lista");
    $this->get("/{id}", "EmprestimoController:buscar");
    $this->post("/", "EmprestimoController:adicionar");
    $this->put("/{id}", "EmprestimoController:alterar");
    $this->delete("/{id}", "EmprestimoController:excluir");
});

//$app->group("/cliente", function() {
//    $this->get("/", "ClienteController:lista");
//    $this->get("/{id}", "ClienteController:buscar");
//    $this->post("/", "ClienteController:adicionar");
//    $this->put("/{id}", "ClienteController:alterar");
//    $this->delete("/{id}", "ClienteController:excluir");
//});
//
//
//$app->group("/agencia", function() {
//    $this->get("/", "AgenciaController:lista");
//    $this->get("/{id}", "AgenciaController:buscar");
//    $this->post("/", "AgenciaController:adicionar");
//    $this->put("/{id}", "AgenciaController:alterar");
//    $this->delete("/{id}", "AgenciaController:excluir");
//});
//
//$app->group("/conta", function() {
//    $this->get("/", "ContaController:lista");
//    $this->get("/{id}", "ContaController:buscar");
//    $this->post("/", "ContaController:adicionar");
//    $this->put("/{id}", "ContaController:alterar");
//    $this->delete("/{id}", "ContaController:excluir");
//});

$app->group("/operacao", function() {
    $this->post("/", "OperacaoController:adicionar");
});

$app->run();
