<?php

/**
 * @Entity
 * @Table(name="conta")
 */
class Conta implements \JsonSerializable {

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="decimal", precision=10, scale=2)
     */
    private $saldo = 0;

    /**
     * @Column(type="float", precision=10, scale=2)
     */
    private $limite = 0;

    /**
     * @Column(length=1)
     */
    private $situacao = "A";

    /**
     * @ManyToOne(targetEntity="Agencia")
     * @JoinColumn(name="agenciaId", referencedColumnName="id")
     */
    private $agencia;

    /**
     * @ManyToOne(targetEntity="Cliente")
     * @JoinColumn(name="clienteId", referencedColumnName="id")
     */
    private $cliente;

    function getId() {
        return $this->id;
    }

    function getSaldo() {
        return $this->saldo;
    }

    function getLimite() {
        return $this->limite;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getAgencia() {
        return $this->agencia;
    }

    function getCliente() {
        return $this->cliente;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLimite($limite) {
        $this->limite = $limite;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setAgencia($agencia) {
        $this->agencia = $agencia;
    }

    function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
