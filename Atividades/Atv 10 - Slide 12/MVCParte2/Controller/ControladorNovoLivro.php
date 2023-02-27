<?php
require "../Model/Livro.php";
class ControladorLivroIncluir{
   private $livro;

   public function __construction(){
      //criar um objeto livro 
      $this->$livro = new Livro();
   }
   
   public function processaRequisicao(){
      //receber os dados do formulario e setar o objeto
      $this->livro->setTitulo($_POST["nome"]);
      $this->livro->setEdicao($_POST["edicao"]);
      $this->livro->setAno($_POST["ano"]);
      echo "cheguei aqui " . $this->livro->getTitulo();
      //mandar salvar
      //$this->livro->incluirLivro();
 
      //header('Location:ListarLivro.php', true,302);
   }
}
   
   
?>