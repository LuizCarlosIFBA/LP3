<?php
require_once "Model/DAO/CidadeDAO.php";
require_once "Estado.php";
class Cidade{
    private $idcidade;
    private $nome;
    private $estado;


    public function setIdCidade ($id){
        $this->idcidade = $id;   
    }
    public function setNome ($nome){
        $this->nome = $nome;
    }
    public function setEstado ($estado){
        $this->estado = $estado;
    }

    public function getIdCidade (){
        return $this->idcidade;   
    }    
    public function getNome (){
        return $this->nome;
    }
    public function getEstado (){
        return $this->estado;
    }


    public function pesquisarCidade(){ #Informa ID e adquire o restante das informações
        $cidadeDAO = new CidadeDAO();
        $cidadeDAO->pesquisarCidade($this);
    }

    public function pesquisarEstadoCidades(){ #Informa ID do estado e retorna lista com todas cidades disponíveis
        $cidadeDAO = new CidadeDAO();
        return $cidadeDAO->pesquisarEstadoCidades($this);
    }

    public function listarTudo(){ #Lista todas as cidades
        $cidadeDAO = new CidadeDAO();
        return $cidadeDAO->listarTudo();
    }
}

?>
