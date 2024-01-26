<?php
class Banco{
    
    public static function conectar(){
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $dbname = "db_mercado";
        
        try{
            $minhaConexao = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
            $minhaConexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $minhaConexao;
        } 
        catch(PDOException $e) {
            echo "Conexão falhou: ". $e->getMessage();
            return null;
        }
    }
    
}
?>
