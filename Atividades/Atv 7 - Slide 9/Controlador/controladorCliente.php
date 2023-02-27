<?php

$acao = $_POST['consultar'];
$email = $_POST['eamil'];
$cpf = $_POST['cpf'];
$nome = $_POST["nome"];
require "Model/Cliente.php";
if ($acao!==null){
$meuCliente = new Cliente($cpf);

if ( $meuCliente->pesquisar() )
{
     header('Location: /View/Resposta.php'); 
}
else
{
//chamar tela de erro
} 
}
else{
   $email = $_POST["eamil"];
   $cpf = $_POST["cpf"];
   $nome = $_POST["nome"];
   $meuCliente = new Cliente($cpf, $nome, $email);
   if ($meuCliente->incluir() > 0){
       header('Location: ..\View\Sucesso.php'); 
    }
}

var_dump($_POST); ?>
