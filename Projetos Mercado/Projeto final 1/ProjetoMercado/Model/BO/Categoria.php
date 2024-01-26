<?php
require_once "Model/DAO/CategoriaDAO.php";
class Categoria{
    private $idcategoria;
    private $nome;

    
    public function setIdCategoria ($id){
        $this->idcategoria = $id;   
    }
    public function setNome ($nome){
        $this->nome = $nome;
    }

    public function getIdCategoria (){
        return $this->idcategoria;   
    }    
    public function getNome (){
        return $this->nome;
    }


    public function incluirCategoria(){
        $categoriaDAO = new CategoriaDAO();
        $categoriaDAO->incluirCategoria($this);
    }

    public function excluirCategoria(){
        $categoriaDAO = new CategoriaDAO();
        $categoriaDAO->excluirCategoria($this);
    }

    public function alterarCategoria(){
        $categoriaDAO = new CategoriaDAO();
        $categoriaDAO->alterarCategoria($this);
    }

    public function pesquisarCategoria(){
        $categoriaDAO = new CategoriaDAO();
        $categoriaDAO->pesquisarCategoria($this);
    }

    public function listarTudo(){
        $categoriaDAO = new CategoriaDAO();
        return $categoriaDAO->listarTudo();
    }
}

?>
