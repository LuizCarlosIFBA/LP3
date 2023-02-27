<?php
    try{    
        $pdo = new PDO("mysql:dbname=exercicios;host=localhost","root","");
        echo "Conectado com sucesso";
        
        echo "<br>";

        $sql = $pdo->prepare("update exercicios.livro set edicao=20,ano=2010 where codigo=1");
        $sql->execute();

        echo "<br>";
        echo "Alterado com sucesso";
    }catch(PDOException $e){
        echo "Erro com banco de dados: ".$e->getMessage();        
    }
    catch(Exception $e){
        echo "Erro generico: ".$e->getMessage();      
    }
    
?>

