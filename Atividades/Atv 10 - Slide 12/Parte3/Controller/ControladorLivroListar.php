<?php
require "Model/Livro.php";
class ControladorLivroListar{
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