<?php

// esse código faz uma copia do arquivo selecionado no formulario para a pasta atual
// o nome do arquivo passa a ser o id correspondente do banco. Tambem grava esse nome no banco

//recupera o arquivo selecionado do formulário
$imagem = $_FILES["imagem"];
$servername = "localhost:3306"; 
$username = "root";
$password = "";
$dbname = "bd_livraria";

try {
  //conecta
  $minhaConexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $minhaConexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //inseri o livro no banco de dados
  $sql = $minhaConexao->prepare("insert into bd_livraria.livro (nome, edicao, ano, preco) values (:nome, :edicao,:ano,:preco)");
  $sql->bindParam("nome",$nome);
  $sql->bindParam("edicao",$edicao);
  $sql->bindParam("ano",$ano);
  $sql->bindParam("preco",$preco);
  $nome = "Teste de imagem 2";
  $edicao = 1;
  $ano = 1970;
  $preco = 200;
  
  $sql->execute();
  //recupera o id criado para o livro
  $last_id = $minhaConexao->lastInsertId();

   //verifica se foi selecionada imagem no formulario anterior
  if($imagem != NULL) {
    //defini o nome do novo arquivo, que será o id gerado para o livro
    $nomeFinal = $last_id.'.jpg';
    //move o arquivo para a pasta atual com esse novo nome
    if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
      //atualiza o banco de dados para guardar o nome do arquivo gerado.
       $sql = $minhaConexao->prepare("update bd_livraria.livro set nomeImagem = :nomeImagem where codigo=:codigo");
       $sql->bindParam("nomeImagem",$nomeFinal);
       $sql->bindParam("codigo",$last_id);
       $sql->execute();
       
    }
  } 
  echo "incluído com sucesso";
  
}
catch(PDOException $e) {
  echo "entrou no catch".$e->getmessage();
}

?>