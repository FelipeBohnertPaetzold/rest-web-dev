<?php

/** @Entity 
  @Table(name="operacao")
 */
class Operacao implements JsonSerializable {

    /**
     * @Id @Column(type="integer") 
     * @GeneratedValue(strategy="AUTO") */
    protected $id;

    /**
     * @ManyToOne(targetEntity="Conta")
     * @JoinColumn(name="contaId", referencedColumnName="id")
     * */
    protected $conta;

    /** @Column(type="decimal", precision=10, scale=2) */
    protected $valor;

    /** @Column(length=1) */
    protected $tipo; //D = Débito ou C = Crédito

    /** @Column(type="datetime") */
    private $dataOperacao;

    function __construct() {
        $this->dataOperacao = new \DateTime();
    }

    function getId() {
        return $this->id;
    }

    function getConta() {
        return $this->conta;
    }

    function getValor() {
        return $this->valor;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getDataOperacao() {
        return $this->dataOperacao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setConta($conta) {
        $this->conta = $conta;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setDataOperacao($dataOperacao) {
        $this->dataOperacao = $dataOperacao;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
