<?php
 class Livro{
    private $codigo;
    private $titulo;
    private $edicao;
    private $ano;

    public function getCodigo(){
        return $this->codigo;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function listarTodos(){
        //vai ao banco de dados e pega todos os livros
        $listaLiv=array();
        for ($i=0; $i<5; $i++){
            $livro = new Livro();
            $livro->setCodigo($i+1);
            $livro->setTitulo("Livro".$i+1);
            $listaLiv[$i] = $livro;
        }
        return $listaLiv;
    }
    public function salvar(){
        // vai ao banco de dados e salva os dados do livro
    }
 }
?>