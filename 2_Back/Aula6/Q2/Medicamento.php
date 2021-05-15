<?php

 class Medicamento{
    private $soma;
    private $preco;
    private $principioAtivo;

    public function _construct($nome, $preco, $principioAtivo){
        $this->nome =$nome;
        $this->preco = $preco;
        $this->principioAtivo = $principioAtivo;
    }
    
    public function getPrincipioAtivo(){
        return $this-> principioAtivo;
    }

    public function getPreco(){
        return $this->preco;
    }
    
    public function getNome(){
        return $this->nome;
    }    

    public function substitui($outroMed){
        if($this->principioAtivo==$outroMed->getPrincioAtivo()){
            return "sim"
        }else return "não"
    }
 }
?>
