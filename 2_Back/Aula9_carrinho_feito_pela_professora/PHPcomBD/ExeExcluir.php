<?php
        $servername = "localhost:3306"; 
        $username = "root";
        $password = "";
        $dbname = "bd_livraria";

      try {
        $minhaConexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $minhaConexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $minhaConexao->prepare("delete from bd_livraria.livro where codigo=3");
        $sql->execute();
        echo "excluído com sucesso";
      }
      catch(PDOException $e) {
        echo "entrou no catch".$e->getmessage();
      }
    $minhaConexao = null;
?>