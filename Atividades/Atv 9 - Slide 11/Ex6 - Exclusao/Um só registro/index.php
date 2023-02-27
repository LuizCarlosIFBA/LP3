<?php
    try{    
        $pdo = new PDO("mysql:dbname=exercicios;host=localhost","root","");
        echo "Conectado com sucesso";
        
        echo "<br>";
        $sql = $pdo->prepare("SELECT * FROM exercicios.livro WHERE codigo = :id");
        $sql->bindValue(":id",3);
        $sql->execute();
        $resultado=$sql->fetch(PDO::FETCH_ASSOC);

        foreach($resultado as $key => $value){
            echo $key.":".$value."<br>";
        }
    }catch(PDOException $e){
        echo "Erro com banco de dados: ".$e->getMessage();        
    }
    catch(Exception $e){
        echo "Erro generico: ".$e->getMessage();      
    }
    
?>

