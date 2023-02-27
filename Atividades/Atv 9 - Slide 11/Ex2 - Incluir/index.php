<?php
    try{    
        $pdo = new PDO("mysql:dbname=exercicios;host=localhost","root","");
        echo "Conectado com sucesso";
           
        $sql = $pdo->prepare("insert into exercicios.livro(nome,edicao,ano)values('Matematica 1',1,2015)");
        $sql->execute();

        echo "<br>";
        echo "incluido com sucesso";
    }catch(PDOException $e){
        echo "Erro com banco de dados: ".$e->getMessage();        
    }
    catch(Exception $e){
        echo "Erro generico: ".$e->getMessage();      
    }
    
?>

