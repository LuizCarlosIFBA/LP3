<?php
require_once "Model/DAO/PedidoFuncionarioDAO.php";
require_once "Pedido.php";
require_once "Funcionario.php";
class PedidoFuncionario{
    private $pedido;
    private $funcionario;
    
    
    public function setPedido($pedido){
        $this->pedido = $pedido;
    }
    public function setFuncionario($funcionario){
        $this->funcionario = $funcionario;
    }

    public function getPedido(){
        return $this->pedido;
    }
    public function getFuncionario(){
        return $this->funcionario;
    }
    

    public function incluirEntrada(){
        $pedidoFuncionarioDAO = new PedidoFuncionarioDAO();
        $pedidoFuncionarioDAO->incluirEntrada($this);
    }

    public function excluirEntrada(){
        $pedidoFuncionarioDAO = new PedidoFuncionarioDAO();
        $pedidoFuncionarioDAO->excluirEntrada($this);
    }

    /* Neste caso, vale mais a pena excluir e inserir

    public function alterarEntrada(){
        $pedidoFuncionarioDAO = new PedidoFuncionarioDAO();
        $pedidoFuncionarioDAO->alterarEntrada($this);
    }
    */

    public function pesquisarPedido(){
        $pedidoFuncionarioDAO = new PedidoFuncionarioDAO();
        $pedidoFuncionarioDAO->pesquisarPedido($this);
    }

    public function pesquisarFuncionario(){
        $pedidoFuncionarioDAO = new PedidoFuncionarioDAO();
        $pedidoFuncionarioDAO->pesquisarFuncionario($this);
    }

    public function listarTudo(){
        $pedidoFuncionarioDAO = new PedidoFuncionarioDAO();
        return $pedidoFuncionarioDAO->listarTudo();
    }
}

?>