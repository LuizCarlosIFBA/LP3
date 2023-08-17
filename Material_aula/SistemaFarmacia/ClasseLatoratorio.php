<?php

class Laboratorio{
    private $nomeLab;
    private $percLucro;

    function __construct($nome,$perc){
        $this->nomeLab = $nome;
        $this->percLucro = $perc;
    }

    public function getPercLucro(){
        return $this->percLucro;
    } 
}
?>