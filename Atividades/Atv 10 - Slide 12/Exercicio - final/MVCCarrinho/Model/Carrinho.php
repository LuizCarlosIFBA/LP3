<?php
//esta classe cria um carrinho de compras
//o carrinho produto e quantidade
class Carrinho{
    private $produto;
    private $quantidade;

    public function getProduto(){
        return $this->produto;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function setProduto($produto){
        $this->produto = $produto
    }
    public function setQuantidade($quantidade){
        $this->quantidade = $quanidade;
    }
 }

?>