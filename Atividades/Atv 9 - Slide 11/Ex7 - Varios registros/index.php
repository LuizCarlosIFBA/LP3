<?php
    try{    
        $pdo = new PDO("mysql:dbname=exercicios;host=localhost","root","");
        echo "Conectado com sucesso";
        
        echo "<br>";
        $sql = $pdo->prepare("SELECT * FROM exercicios.livro");
        
        $sql->execute();
       
        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
            echo "<br>";
            echo "Código: {$linha['codigo']}";
            echo "Título: {$linha['nome']}";
            echo "Edição: {$linha['edicao']}";
            echo "Ano: {$linha['ano']}";
            echo "<br>";
        }
    }catch(PDOException $e){
        echo "Erro com banco de dados: ".$e->getMessage();        
    }
    catch(Exception $e){
        echo "Erro generico: ".$e->getMessage();      
    }
?>

