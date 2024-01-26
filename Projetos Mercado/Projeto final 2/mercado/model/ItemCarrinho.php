<?php
//classe que representa os itens do carrinho
//cada item é formado pelo produto e a quantidade comprada
require_once "Produto.php";

class ItemCarrinho
{
    private $produto;
    private $quantidade;

    public function __construct($id, $quantidade)
    {
        $this->quantidade = $quantidade;
        $this->produto = new Produto();
        $this->produto->setIDProduto($id);
        $this->produto->setDadosProduto();
    }

    public function getProduto(){return $this->produto;}
    public function setProduto($produto){$this->$produto = $produto;}
    
    public function getQuantidade(){return $this->quantidade;}    
    public function setQuantidade($quantidade){$this->quantidade = $quantidade;}

    public function getSubTotal()
    {
        return $this->produto->getValor() *  $this->quantidade;
    }

    public function getSubTotalComDesconto()
    {
        return $this->produto->getValorDesconto() *  $this->quantidade;
    }
}
