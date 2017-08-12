<?php

/** @Entity 
  @Table(name="cliente")
 */
class Cliente implements JsonSerializable {

    /**
     * @Id @Column(type="integer") 
     * @GeneratedValue(strategy="AUTO") */
    protected $id;

    /** @Column(length=200) */
    protected $nome;

    /** @Column(length=11) */
    protected $cpf;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
