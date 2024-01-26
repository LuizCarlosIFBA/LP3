<?php
require_once "Produto.php";
class CarrinhoItem{
    private $produto;
    private $quantidade;
   

    public function __construct($id, $qtd){
        $this->produto = new Produto();
        $this->produto->setIdProduto($id);
        $this->produto->pesquisarProduto();
        $this->quantidade = $qtd;
    }
    

    public function setProduto($produto){
        $this->$produto = $produto;
    }
    public function setQuantidade($qtd){
        $this->quantidade = $qtd;
    }

    public function getProduto(){
        return $this->produto;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    
    public function getSubTotal(){
        return $this->produto->getPreco() * $this->quantidade;
    }
}
?>