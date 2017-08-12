<?php

/**
 * @Entity
 * @Table(name="aluno")
 */
class Aluno implements JsonSerializable{
    
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(length=200)
     */
    private $nome;
    
    /**
     * @Column(length=1)
     */
    private $situacao;
    
    /**
     * @ManyToOne(targetEntity="Curso")
     * @JoinColumn(name="cursoId", referencedColumnName="id")
     */
    private $curso;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getCurso() {
        return $this->curso;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }

    
    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
