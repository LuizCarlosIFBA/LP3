<?php
require_once "ICarrinho.php";
require_once "CarrinhoItem.php";
class CarrinhoSession implements ICarrinho{
    private $itens;

    public function __construct(){
        $this->itens = array();
        $this->itens = $this->restaurarCarrinho();
    }

    
    public function getCarrinhoItens(){
        return $this->itens;
    }
    public function getValorTotal(){
        $total = 0;
        foreach($this->itens as $item){
            $total += $item->getSubTotal();
        }
        return $total;
    } 


    public function verificarPresenca($id){
        return isset($this->itens[$id]);
    }

    public function adicionarItem($item) {
        $id = $item->getProduto()->getIdProduto();

        if (!$this->verificarPresenca($id)) {
            $this->itens[$id] = $item;
        }
        else {
            $this->itens[$id]->setQuantidade($this->itens[$id]->getQuantidade() + 1);
        }      
    }

    public function removerItem($id){
        if ($this->verificarPresenca($id)) {
            unset($this->itens[$id]);
        }   
    }

    public function removerTudo(){
        unset($this->itens);   
    }

    public function atualizarQuantidade($id) {
        if (isset($_POST["aumentar"])){
            $this->itens[$id]->setQuantidade($this->itens[$id]->getQuantidade() + 1);
        } 
        else if (isset($_POST["diminuir"])){
            $this->itens[$id]->setQuantidade($this->itens[$id]->getQuantidade() - 1);
        }
        if ($this->itens[$id]->getQuantidade()==0){
            $this->removerItem($id);  
        }
    } 

    public function aplicarCupom($cupom){
        if ($cupom == "palavrachave123") {
            $_SESSION["desconto"] = 0.2;
        }
    }

    public function __destruct(){
        $_SESSION["carrinho"] = serializeCorreto($this->itens);
    }
 
    public function restaurarCarrinho(){
        if (isset($_SESSION["carrinho"])){
            return unserialize($_SESSION["carrinho"]);
        }
        else {
            return array(); 
        }
    }
}

?>
