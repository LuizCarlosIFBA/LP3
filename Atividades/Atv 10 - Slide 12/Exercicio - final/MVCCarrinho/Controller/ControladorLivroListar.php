<?php
require_once "Model/Livro.php";
require_once "IControlador.php";
class ControladorLivroListar implements IControlador{
    private $livro;

    public function __construct(){
        $this->livro = new Livro();
    }

    public function processaRequisicao(){
        $listaLivros = $this->livro->listarTodos();
        require "View/ListarLivro.php";
    }
}
    
    
?>