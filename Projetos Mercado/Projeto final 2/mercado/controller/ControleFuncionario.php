<?php
require_once "model/funcionario.php";
require_once "model/funcionarioDAO.php";
require_once "model/usuarioDAO.php";

require_once "model/processamentoPedidoDAO.php";
require_once "model/Pedido.php";
class ControleFuncionario 
{
    /**
     * Mostra a página de funcionário com os dados dele e as demandas.
     */
    public static function mostrarPaginaFuncionario()
    {
        $funcionario = new Funcionario();
        $funcionario->setIDUsuario($_SESSION["idusuario"]);
        $funcionario->setNome($_SESSION["nomeusuario"]);
        $funcionario->setEmail($_SESSION["email"]);
        
        FuncionarioDAO::getFuncionarioInfo($funcionario);
        
        if($funcionario->getIDCargo() == 0 || $funcionario->getIDFuncionario() == 0)
            return;

        $pedidoAtual = new Pedido();
        $pedidoAtual->setIDPedido(ProcessamentopedidoDAO::getDemandaFuncionario($funcionario->getIDFuncionario()));
        

        require "view/paginaFuncionario.php";
    }
}
?>