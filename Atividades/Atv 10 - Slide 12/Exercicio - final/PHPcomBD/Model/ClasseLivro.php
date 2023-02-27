<?php
class Livro{
    private $codigo;
    private $nomeLivro;
    private $edicao;
    private $ano;

    public function __construct($nomeLivro, $edicao, $ano){ 
        $this->nomeLivro=$nomeLivro;
        $this->edicao=$edicao;
        $this->ano=$ano;
    }

    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }
    public function getNomeLivro(){
        return $this->nomeLivro;
    }
    public function getEdicao(){
        return $this->edicao;
    }
    public function getAno(){
        return $this->ano;
    }
    public function getCodigo(){
        return $this->codigo;
    }
}
?>