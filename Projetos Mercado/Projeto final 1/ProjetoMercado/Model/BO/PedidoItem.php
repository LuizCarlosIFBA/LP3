<?php
require_once "Model/DAO/PedidoItemDAO.php";
require_once "Pedido.php";
require_once "Produto.php";
class PedidoItem{
    private $pedido;
    private $produto;
    private $qtd_item;

    
    public function setPedido ($pedido){
        $this->pedido = $pedido;   
    }
    public function setProduto ($produto){
        $this->produto = $produto;   
    }
    public function setQuantidade ($qtd){
        $this->qtd_item = $qtd;   
    }
    
    public function getPedido (){
        return $this->pedido;   
    }
    public function getProduto (){
        return $this->produto;   
    }   
    public function getQuantidade (){
        return $this->qtd_item;   
    }        


    public function incluirItem(){
        $pedidoItemDAO = new PedidoItemDAO();
        $pedidoItemDAO->incluirItem($this);
    }

    public function excluirItem(){
        $pedidoItemDAO = new PedidoItemDAO();
        $pedidoItemDAO->excluirItem($this);
    }

    public function pesquisarPedido(){
        $pedidoItemDAO = new PedidoItemDAO();
        $pedidoItemDAO->pesquisarPedido($this);
    }

    public function pesquisarProduto(){
        $pedidoItemDAO = new PedidoItemDAO();
        $pedidoItemDAO->pesquisarProduto($this);
    }

    public function listarTudo(){
        $pedidoItemDAO = new PedidoItemDAO();
        return $pedidoItemDAO->listarTudo();
    }
}

?>
