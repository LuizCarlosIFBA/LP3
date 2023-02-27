<?php
    try{    
        $pdo = new PDO("mysql:dbname=exercicios;host=localhost","root","");
        echo "Conectado com sucesso";
           
        $sql = $pdo->prepare("insert into exercicios.livro(nome,edicao,ano)values('Aprendendo HTML',3,2014)");
        $sql->execute();

        $last_id = $pdo->lastInsertId();   
        echo "<br>";
        echo "O número gerado foi: ",$last_id;
        echo "<br>";
        echo "incluido com sucesso";
    }catch(PDOException $e){
        echo "Erro com banco de dados: ".$e->getMessage();        
    }
    catch(Exception $e){
        echo "Erro generico: ".$e->getMessage();      
    }
    
?>

