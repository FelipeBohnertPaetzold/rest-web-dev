<?php

/**
 * @Entity
 * @Table(name="livro")
 */
class Livro implements JsonSerializable{
    
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
     * @Column(type="integer")
     */
    private $publicacao;
    
    /**
     * @ManyToOne(targetEntity="Editora")
     * @JoinColumn(name="editoraId", referencedColumnName="id")
     */
    private $editora;
    
    /**
     * @ManyToOne(targetEntity="Autor")
     * @JoinColumn(name="autorId", referencedColumnName="id")
     */
    private $autor;
    
    /**
     * @Column(type="integer")
     */
    private $edicao;

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
    
    function getPublicacao() {
        return $this->publicacao;
    }

    function getEdicao() {
        return $this->edicao;
    }

    function setPublicacao($publicacao) {
        $this->publicacao = $publicacao;
    }

    function setEdicao($edicao) {
        $this->edicao = $edicao;
    }
    
    function getEditora() {
        return $this->editora;
    }

    function getAutor() {
        return $this->autor;
    }

    function setEditora($editora) {
        $this->editora = $editora;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
