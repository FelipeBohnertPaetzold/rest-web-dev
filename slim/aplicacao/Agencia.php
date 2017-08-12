<?php

/**
 * @Entity
 * @Table(name="agencia")
 */
class Agencia implements \JsonSerializable {

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(length=100)
     */
    private $nome;

    /**
     * @ManyToOne(targetEntity="Banco")
     * @JoinColumn(name="bancoId", referencedColumnName="id")
     */
    private $banco;

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getBanco() {
        return $this->banco;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setBanco($banco) {
        $this->banco = $banco;
    }

    public function jsonSerialize() {        
        return get_object_vars($this);
    }

}
