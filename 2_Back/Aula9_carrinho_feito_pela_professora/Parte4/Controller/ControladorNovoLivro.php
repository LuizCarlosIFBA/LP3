<?php
require "Model/Livro.php";
class ControladorNovoLivro{
   private $livro;

   public function __construct(){
      $this->livro = new Livro();
  }
   
   public function processaRequisicao(){
      //receber os dados do formulario e setar o objeto
      $this->livro->setTitulo($_POST['nome']);
      $this->livro->setEdicao($_POST['edicao']);
      $this->livro->setAno($_POST['ano']);
      
      $this->livro->incluirLivro();
 
      header('Location:ListarLivro.php', true,302);
   }
}
   
   
?>