<?php
    try{    
        $pdo = new PDO("mysql:dbname=exercicios;host=localhost","root","");
        echo "Conectado com sucesso";
           
        $sql = $pdo->prepare("insert into exercicios.livro(nome,edicao,ano)values(nome,edicao,ano)");
        $sql->execute();

        $sql->bindParam("nome",$nome);
        $sql->bindParam("edicao",$edicao);
        $sql->bindParam("ano",$ano);
        $nome ="Origem";
        $edicao = 5;
        $ano = 2020;

        echo "<br>";
        echo "incluido com sucesso";
    }catch(PDOException $e){
        echo "Erro com banco de dados: ".$e->getMessage();        
    }
    catch(Exception $e){
        echo "Erro generico: ".$e->getMessage();      
    }
    
?>

