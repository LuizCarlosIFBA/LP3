<?php
require_once "Model/DAO/BairroDAO.php";
require_once "Cidade.php";
class Bairro{
    private $idbairro;
    private $nome;
    private $cidade;

    
    public function setIdBairro ($id){
        $this->idbairro = $id;   
    }
    public function setNome ($nome){
        $this->nome = $nome;
    }
    public function setCidade ($cidade){
        $this->cidade = $cidade;
    }

    public function getIdBairro (){
        return $this->idbairro;   
    }    
    public function getNome (){
        return $this->nome;
    }
    public function getCidade (){
        return $this->cidade;
    }


    public function pesquisarBairro(){
        $bairroDAO = new BairroDAO();
        $bairroDAO->pesquisarBairro($this);
    }

    public function pesquisarCidadeBairros(){ #Informa ID da cidade e retorna lista com todos bairros disponíveis
        $bairroDAO = new BairroDAO();
        return $bairroDAO->pesquisarCidadeBairros($this);
    }

    public function listarTudo(){
        $bairroDAO = new BairroDAO();
        return $bairroDAO->listarTudo();
    }
}

?>
