<?php
   require "Livro.php";
   //criar um objeto livro
   $livro = new Livro();
   //receber os dados do formulario e setar o objeto
   $livro->setTitulo($_POST["nome"]);
   $livro->setEdicao($_POST["edicao"]);
   $livro->setAno($_POST["ano"]);
   
   //mandar salvar
   $livro->incluirLivro();

   header('Location:ListarLivro.php', true,302);
?>