<?php

class Pessoa extends PessoaX implements JsonSerializable {

    private $id;
    private $nome;
    private $email;

    function __construct($id, $nome, $email, $cpf) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

}
