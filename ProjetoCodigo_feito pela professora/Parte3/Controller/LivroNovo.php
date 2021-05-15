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
        require "View/Livro/CadLivro.php";
    }

}

?>