<?php
require_once "Model/DAO/EstadoDAO.php";
class Estado{
    private $idestado;
    private $nome;
    private $sigla;

    
    public function setIdEstado ($id){
        $this->idestado = $id;   
    }
    public function setNome ($nome){
        $this->nome = $nome;
    }
    public function setSigla ($sigla){
        $this->sigla = $sigla;
    }

    public function getIdEstado (){
        return $this->idestado;   
    }    
    public function getNome (){
        return $this->nome;
    }
    public function getSigla (){
        return $this->sigla;
    }


    public function pesquisarEstado(){
        $estadoDAO = new EstadoDAO();
        $estadoDAO->pesquisarEstado($this);
    }

    public function listarTudo(){
        $estadoDAO = new EstadoDAO();
        return $estadoDAO->listarTudo();
    }
}

?>
