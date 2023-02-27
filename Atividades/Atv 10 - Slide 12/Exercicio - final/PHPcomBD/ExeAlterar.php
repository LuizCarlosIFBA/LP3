<?php
        $servername = "localhost:3306"; 
        $username = "root";
        $password = "";
        $dbname = "bd_livraria";

      try {
        $minhaConexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $minhaConexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $minhaConexao->prepare("update bd_livraria.livro set edicao=20, ano=2010 where codigo=1");
        $sql->execute();
        echo "alterado com sucesso";
      }
      catch(PDOException $e) {
        echo "entrou no catch".$e->getmessage();
      }
    $minhaConexao = null;
?>