<?php
        $servername = "localhost:3306"; 
        $username = "root";
        $password = "";
        $dbname = "bd_livraria";

      try {
        $minhaConexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $minhaConexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = $minhaConexao->prepare("select * from bd_livraria.livro");
        $codigo = 1;
                
        $sql->execute();
        $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            echo " Codigo:",$linha['codigo'];
            echo " Titulo:",$linha['nome'];
            echo " Edição:",$linha['edicao'];
            echo " Ano:",$linha['ano'];
            echo "=========";
        }
      }
      catch(PDOException $e) {
        echo "entrou no catch".$e->getmessage();
      }
    $minhaConexao = null;
?>