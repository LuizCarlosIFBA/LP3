<?php
class Cartao
{
    #atributos
    private $nome;
    private $numero;
    private $validade;
    private $cvv;
    
    function __construct() #construct
    {
    }

    #métodos
    public function metodo()
    {
        
    }

    public function getNome() {return $this->nome;}
    public function setNome($nome) {$this->nome = $nome;}
    
    public function getNumero() {return $this->numero;}
    public function setNumero($numero) {$this->numero = $numero;}

    public function getValidade() {return $this->validade;}
    public function setValidade($validade) {$this->validade = $validade;}

    public function getCvv() {return $this->cvv;}
    public function setCvv($cvv) {$this->cvv = $cvv;}
}
?>