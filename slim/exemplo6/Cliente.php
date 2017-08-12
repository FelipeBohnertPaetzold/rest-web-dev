<?php

class Cliente implements JsonSerializable {

    private $id;
    private $nome;
    private $idade;
    private $email;

    function __construct($id, $nome, $idade, $email) {
        $this->id = $id;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
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

    function getIdade() {
        return $this->idade;
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

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function setEmail($email) {
        $this->email = $email;
    }

}
