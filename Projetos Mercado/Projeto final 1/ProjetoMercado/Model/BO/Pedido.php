<?php
require_once "Model/DAO/PedidoDAO.php";
require_once "Usuario.php";
class Pedido{
    private $idpedido;
    private $cliente;
    
    
    public function setIdPedido($id){
        $this->idpedido = $id;
    }
    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function getIdPedido(){
        return $this->idpedido;
    }
    public function getCliente(){
        return $this->cliente;
    }


    public function incluirPedido(){
        $pedidoDAO = new PedidoDAO();
        $pedidoDAO->incluirPedido($this);
    }

    public function excluirPedido(){
        $pedidoDAO = new PedidoDAO();
        $pedidoDAO->excluirPedido($this);
    }

    public function alterarPedido(){
        $pedidoDAO = new PedidoDAO();
        $pedidoDAO->alterarPedido($this);
    }

    public function pesquisarPedido(){
        $pedidoDAO = new PedidoDAO();
        $pedidoDAO->pesquisarPedido($this);
    }

    public function listarTudo(){
        $pedidoDAO = new PedidoDAO();
        return $pedidoDAO->listarTudo();
    }
}

?>
