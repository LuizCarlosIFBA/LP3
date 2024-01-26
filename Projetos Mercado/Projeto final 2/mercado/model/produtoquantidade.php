<?php
class Produtoquantidade
{
    #atributos
    private $produto;
    private $quantidade;
    private $valorreferencia;
    
    function __construct() #construct
    {
    }

    #métodos
    public function metodo()
    {
        
    }

    public function getProduto() {return $this->produto;}
    public function setProduto($produto) {$this->produto = $produto;}

    public function getQuantidade() {return $this->quantidade;}
    public function setQuantidade($quantidade) {$this->quantidade = $quantidade;}
    
    public function getValorreferencia() {return $this->valorreferencia;}
    public function setValorreferencia($valorreferencia) {$this->valorreferencia = $valorreferencia;}
}
?>
