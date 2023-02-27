<?php
    try{    
        $pdo = new PDO("mysql:dbname=exercicios;host=localhost","root","");
        echo "Conectado com sucesso";
    }catch(PDOException $e){
        echo "Erro com banco de dados: ".$e->getMessage();        
    }
    catch(Exception $e){
        echo "Erro generico: ".$e->getMessage();      
    }
    
?>
