<?php
require_once "IControlador.php";
require_once "Model/BO/Pedido.php";
class ControladorPedido implements IControlador{
    
    public function processaRequisicao($acao){
        if ($acao=="CP") {
            $pedido = new Pedido();
            
            $usuario = new Usuario;
            $pedido->setCliente($usuario);
            $pedido->getCliente()->setIdUsuario($_POST["idusuario"]);

            $pedido->incluirPedido();

            $_SESSION["pedido"] = serializeCorreto($pedido);

            header("Location: RegistrarPagamento");
            exit();
        }
        else if ($acao=="LTP") {
            $pedido = new Pedido();

            $lista = $pedido->listarTudo();
            $_SESSION["listapedidos"] = serializeCorreto($lista);

            header("Location: ListaPedidos");
            exit();
        }
        else if ($acao=="CP") {
            $pedido = new Pedido();

            if(isset($_SESSION["pedido"])){
                $pedido = new Pedido();
                $pedido = unserialize($_SESSION["pedido"]);
            }

            $pedido->excluirPedido();

            $_SESSION["excluido"] = true;

            header("Location: Atendimento");
            exit();
        }
        
    }

} 
?>