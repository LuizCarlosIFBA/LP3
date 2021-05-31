<?php
   require ("..\Model\ClasseLivro.php");
   require ("..\Model\ClasseLivroDAO.php");
   $nome = $_POST["nomeLivro"];
   $edicao = $_POST["edicao"];
   $ano = $_POST["ano"];
   //$codigo = $_POST["codigoLivro"];

   $liv = new Livro($nome, $edicao, $ano);
   //$liv->setCodigo($codigo);
   $livDAO = new LivroDAO();
   $livDAO->incluir($liv);
   //$livDAO->alterar($liv);
?>