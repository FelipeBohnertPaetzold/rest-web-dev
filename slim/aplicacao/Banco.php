<?php

/**
 * @Entity
 * @Table(name="banco")
 */
class Banco implements \JsonSerializable {

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(length=200)
     */
    private $nome;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
