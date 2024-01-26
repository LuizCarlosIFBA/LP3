<?php
class Banco 
{
    public static function conectarBanco()
    {
        $servername = "localhost:3307";
        $username = "root";
        $password = "";
        $bdname = "mercado";
        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=$bdname", $username, $password);
            // set the PDO error mode to exception  
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
            return $conn;
        }
        catch(PDOException $e)
        {
            echo "<h2>Connection failed: ". $e->getMessage() . "</h2>";
            return null;
        }
    }
}

?>