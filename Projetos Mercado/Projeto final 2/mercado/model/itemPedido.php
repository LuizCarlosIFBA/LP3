<?php
class ItemPedido
{
    #atributos
    private $idproduto;
    private $nome;
    private $valorreferencia;
    private $quantidade;
    
    function __construct(){}

    public function getIdproduto() {return $this->idproduto;}
    public function setIdproduto($idproduto) {$this->idproduto = $idproduto;}

    public function getNome() {return $this->nome;}
    public function setNome($nome) {$this->nome = $nome;}

    public function getValorreferencia() {return $this->valorreferencia;}
    public function setValorreferencia($valorreferencia) {$this->valorreferencia = $valorreferencia;}

    public function getQuantidade() {return $this->quantidade;}
    public function setQuantidade($quantidade) {$this->quantidade = $quantidade;}
}
?>
