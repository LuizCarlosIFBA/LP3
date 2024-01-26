<?php
require_once "IControlador.php";
require_once "Model/BO/Feedback.php";
class ControladorFeedback implements IControlador{
    
    public function processaRequisicao($acao){
        if ($acao=="CF") {
            $feedback = new Feedback();
            $pedido = new Pedido();

            $feedback->setEstrelas($_POST["estrelas"]);
            $feedback->setOpiniao($_POST["opiniao"]);
            $feedback->setPedido($pedido);
            $feedback->getPedido()->setIdPedido($_POST["idpedido"]);

            $feedback->incluirFeedback();

            $_SESSION["feedback"] = serializeCorreto($feedback); 

            header("Location: Concluir");
            exit();
        }        
    }

}
?>