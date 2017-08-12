<?php

/**
 * @Entity
 * @Table(name="emprestimo")
 */
class Emprestimo implements JsonSerializable{
    
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Column(type="datetime")
     */
    private $dataEmprestimo;
    
    /**
     * @Column(type="datetime")
     */
    private $dataPrevista;
    
    /**
     * @Column(type="datetime")
     */
    private $dataDevolucao;
    
    /**
     * @Column(type="float")
     */
    private $multa;
    
    /**
     * @ManyToOne(targetEntity="Livro")
     * @JoinColumn(name="livroId", referencedColumnName="id")
     */
    private $livro;
    
    /**
     * @ManyToOne(targetEntity="Aluno")
     * @JoinColumn(name="alunoId", referencedColumnName="id")
     */
    private $aluno;
    
    function getId() {
        return $this->id;
    }

    function getDataEmprestimo() {
        return $this->dataEmprestimo;
    }

    function getDataPrevista() {
        return $this->dataPrevista;
    }

    function getDataDevolucao() {
        return $this->dataDevolucao;
    }

    function getMulta() {
        return $this->multa;
    }

    function getLivro() {
        return $this->livro;
    }

    function getAluno() {
        return $this->aluno;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDataEmprestimo($dataEmprestimo) {
        $this->dataEmprestimo = $dataEmprestimo;
    }

    function setDataPrevista($dataPrevista) {
        $this->dataPrevista = $dataPrevista;
    }

    function setDataDevolucao($dataDevolucao) {
        $this->dataDevolucao = $dataDevolucao;
    }

    function setMulta($multa) {
        $this->multa = $multa;
    }

    function setLivro($livro) {
        $this->livro = $livro;
    }

    function setAluno($aluno) {
        $this->aluno = $aluno;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
