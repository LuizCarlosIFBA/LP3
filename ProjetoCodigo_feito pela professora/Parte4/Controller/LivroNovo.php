<?php
require 'Model/Livro.php';
require 'IControladorRequisicao.php';

class LivroNovo implements IControladorRequisicao{
    private $repositorioLivro;

    public function __construct(){
        $meulivro = new Livro();
        $this->repositorioLivro = $meulivro;
    }
    public function processaRequisicao():void{
        $tituloPagina = "Cadastrar Livros";
        require "View/Livro/CadLivro.php";
    }

}

?>