<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    try{    
        $pdo = new PDO("mysql:dbname=crud;host=localhost","root","");
        echo "Conectado com sucesso";
           
        $sql = $pdo->prepare("INSERT into cliente(nome,email)values(:nome,:email)");
        $sql->bindParam("nome",$nome);
        $sql->bindParam("email",$email);
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
