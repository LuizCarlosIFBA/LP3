<?php

try {
  /*Conexão com banco*/
  $pdo = new PDO("mysql:dbname=crud;host=localhost", "root", "");
  echo "Conectado com sucesso <br>";

  /*Inserido com sucesso*/
  $sql = $pdo->prepare("insert into crud.cliente(nome,email)values('Luiz','luiz@gmail.com')");
  $sql->execute();
  echo "Inserido com sucesso <br>";

  /*Alterar*/
  $sql = $pdo->prepare("update crud.cliente set nome='Carlos' where codigo=1");
  $sql->execute();
  echo "Alterado com sucesso <br>";

  /*Selecionar*/
  echo "<br>";
  $sql = $pdo->prepare("SELECT * FROM crud.cliente");

  $sql->execute();

  while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<br>";
    echo "Código: {$linha['codigo']}";
    echo "Nome: {$linha['nome']}";
    echo "E-mail: {$linha['email']}";
    echo "<br>";
  }

  /*Apagar*/
  $sql = $pdo->prepare("delete from crud.cliente where codigo=2");
  $sql->execute();
} catch (PDOException $e) {
  echo "Erro com banco de dados: " . $e->getMessage();
} catch (Exception $e) {
  echo "Erro generico: " . $e->getMessage();
}

