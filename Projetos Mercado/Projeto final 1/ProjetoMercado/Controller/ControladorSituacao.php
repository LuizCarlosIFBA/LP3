<?php
require_once "IControlador.php";
require_once "Model/BO/PedidoSituacao.php";
class ControladorSituacao implements IControlador{
    
    public function processaRequisicao($acao){
        if ($acao=="RS") {
            $ps = new PedidoSituacao();
            $situacao = new Situacao();
            $situacao->setIdSituacao(1);

            if (isset($_SESSION["pedido"])){

                $ps->setPedido(unserialize($_SESSION["pedido"]));
                $ps->setSituacao($situacao);
                $ps->setDataAtualizacao("");
            
                $ps->incluirEntrada();

                $_SESSION["pedidosituacao"] = serializeCorreto($ps);

                header("Location: Concluir");
                exit();   
            }
        }          
    }

}   
?>