<?php
require "Model/Livro.php";
class ControladorLivroListar{
    private $livro;

    public function __construction(){
        $this->livro = new Livro();
    }
    public function processaRequisicao(){
        $this->livro = new Livro();
        $listaLivros = $this->livro->listarTodos();
        require "View/ListarLivro.php";
    }
}
    
    
?>