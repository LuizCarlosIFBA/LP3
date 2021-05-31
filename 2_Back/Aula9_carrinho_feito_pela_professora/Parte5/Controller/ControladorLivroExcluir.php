<?php
require "Model/Livro.php";
class ControladorLivroExcluir{
   private $livro;

   public function __construct(){
      $this->livro = new Livro();
  }
   
   public function processaRequisicao(){
      //receber os dados do formulario e setar o objeto
      $this->livro->setCodigo($_POST['id']);
      
      $this->livro->excluirLivro();
 
      header('Location:ListarLivro.php', true,302);
   }
}
   
   
?>