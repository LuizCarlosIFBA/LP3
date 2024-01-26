<?php
require_once "Model/DAO/SituacaoDAO.php";
class Situacao{
    private $idsituacao;
    private $nome;

    
    public function setIdSituacao ($id){
        $this->idsituacao = $id;
    }
    public function setNome ($nome){
        $this->nome = $nome;
    }
    
    public function getIdSituacao (){
        return $this->idsituacao;
    } 
    public function getNome (){
        return $this->nome;
    }
    

    public function incluirSituacao(){
        $situacaoDAO = new SituacaoDAO();
        $situacaoDAO->incluirSituacao($this);
    }

    public function excluirSituacao(){
        $situacaoDAO = new SituacaoDAO();
        $situacaoDAO->excluirSituacao($this);
    }

    public function alterarSituacao(){
        $situacaoDAO = new SituacaoDAO();
        $situacaoDAO->alterarSituacao($this);
    }

    public function pesquisarSituacao(){
        $situacaoDAO = new SituacaoDAO();
        $situacaoDAO->pesquisarSituacao($this);
    }

    public function listarTudo(){
        $situacaoDAO = new SituacaoDAO();
        return $situacaoDAO->listarTudo();
    }
}

?>
