<?php
        $servername = "localhost:3306"; 
        $username = "root";
        $password = "";
        $dbname = "bd_livraria";

      try {
        $minhaConexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $minhaConexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $minhaConexao->prepare("insert into bd_livraria.livro (nome, edicao, ano) values ('Aprendendo HTML', 3,2014)");
        $sql->execute();
        $last_id = $minhaConexao->lastInsertId();
        echo "o numero gerado foi",$last_id;
      }
      catch(PDOException $e) {
        echo "entrou no catch".$e->getmessage();
      }
    $minhaConexao = null;
?>