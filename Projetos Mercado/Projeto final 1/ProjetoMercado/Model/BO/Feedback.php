<?php
require_once "Model/DAO/FeedbackDAO.php";
require_once "Pedido.php";
class Feedback{
    private $idfeedback;
    private $estrelas;
    private $opiniao;
    private $pedido;

    
    public function setIdFeedback ($id){
        $this->idfeedback = $id;
    }
    public function setEstrelas ($estrelas){
        $this->estrelas = $estrelas;
    }
    public function setOpiniao ($opiniao){
        $this->opiniao = $opiniao;
    }
    public function setPedido ($pedido){
        $this->pedido = $pedido;
    }
    
    public function getIdFeedback (){
        return $this->idfeedback;
    }
    public function getEstrelas (){
        return $this->estrelas;
    }
    public function getOpiniao (){
        return $this->opiniao;
    }
    public function getPedido (){
        return $this->pedido;
    }


    public function incluirFeedback(){
        $feedbackDAO = new FeedbackDAO();
        $feedbackDAO->incluirFeedback($this);
    }

    public function excluirFeedback(){
        $feedbackDAO = new FeedbackDAO();
        $feedbackDAO->excluirFeedback($this);
    }

    public function alterarFeedback(){
        $feedbackDAO = new FeedbackDAO();
        $feedbackDAO->alterarFeedback($this);
    }

    public function pesquisarFeedback(){
        $feedbackDAO = new FeedbackDAO();
        $feedbackDAO->pesquisarFeedback($this);
    }

    public function listarTudo(){
        $feedbackDAO = new FeedbackDAO();
        return $feedbackDAO->listarTudo();
    }
}

?>
