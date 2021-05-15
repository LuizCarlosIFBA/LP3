<?php 

require 'Model/Livro.php';
require 'IControladorRequisicao.php';

class LivroListar implements IControladorRequisicao
{

    private $repositorioLivro;

    public function __construct(){
        $meulivro = new Livro();
        $this->repositorioLivro = $meulivro;
        
    }
    public function processaRequisicao():void{
        
       $listaLivros = $this->repositorioLivro->listarTodos();
       require "View/Livro/ListarLivro.php";
    }
}

?>