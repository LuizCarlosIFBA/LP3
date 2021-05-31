<?php
//classe que representa os itens do carrinho
//cada item é formado pelo produto e a quantidade comprada
require_once "Livro.php";
class ItemCarrinho{
   private $produto;
   private $quantidade;
   
   public function __construct($id, $quantidade){
       $this->produto = new Livro();
       $this->produto->setCodigo($id);
       $this->produto->pesquisarLivro();
       $this->quantidade = $quantidade;
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
   public function setProduto($produto){
       $this->$produto = $produto;
   }
   public function setQuantidade($quantidade){
       $this->quantidade = $quantidade;
   }
  
}
?>