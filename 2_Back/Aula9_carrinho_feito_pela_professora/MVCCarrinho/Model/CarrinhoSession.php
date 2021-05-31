<?php
//esta classe cria um carrinho contendo uma lista de itens do carrinho
require_once "ICarrinho.php";
require_once "ItemCarrinho.php";
class CarrinhoSession implements ICarrinho{
   private $itens=array();

   public function __construct(){
      $this->itens = $this->restaura();
   }

   public function estaNoCarrinho($id){
       //verifica de um item (pelo id) já está no carrinho
       //o indice do array é o id do produto
       return isset($this->itens[$id]);
   }

   public function adicionar($item){
    //adiciona um novo item no carrinho
       $id = $item->getProduto()->getCodigo();
       if (!$this->estaNoCarrinho($id))
           $this->itens[$id] = $item;
       else
       //se o item já existir e for selecionado novamente, incrementa a quantidade em 1
           $this->itens[$id]->setQuantidade($this->itens[$id]->getQuantidade()+1);
   }

   public function atualizar($item){
    //altera um item do carrinho quando a quandidade é alterada
    $id = $item->getProduto()->getCodigo();
    if ($this->estaNoCarrinho($id)){
       if ($item->getquantidade()==0){
           $this->apagar($id);
           return;
       }
       $this->itens[$id] = $item;
    }
   }

   public function apagar($id){
    //exclui um item do carrinho
    if ($this->estaNoCarrinho($id))
        unset($this->itens[$id]);
   }

   public function getTotal(){
       // retorna o total de todos os produtos do carrinho
       $total = 0;
       foreach($this->itens as $item){
           $total += $item->getSubTotal();
       }
       return $total;
   }

   public function getItensCarrinho(){
       return $this->itens;
   }

   public function __destruct(){
       //salva os itens do carrinho na sessão para não perder os dados
       // quando o objeto for destruido
       $_SESSION['carrinho2'] = serialize($this->itens);
   }

   public function restaura(){
       // restaura a informação quando estivermos em outra página
       // verifica se esse carrinho existe na sessão
       // se sim retorna o carrinho, se não retorna um array vazio
       if (isset($_SESSION['carrinho2'])){
           return unserialize($_SESSION['carrinho2']);
       }
       else
         return array(); 

   }
}

?>