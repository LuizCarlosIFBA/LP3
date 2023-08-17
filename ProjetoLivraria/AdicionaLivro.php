<?php 
require_once "Livro.php";
$meuLivro = new Livro($_POST['titulo'],$_POST['edicao'],$_POST['ano'],$_POST['preco']);
$meuLivro->incluir();
?>
