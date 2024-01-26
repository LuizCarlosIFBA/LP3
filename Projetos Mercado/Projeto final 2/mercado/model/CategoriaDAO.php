<?php
require_once "model/Banco.php";
class CategoriaDAO
{
    public static function getNomeCategoria($idcategoria)
    {
        $comandoSQL = "SELECT descricao FROM categoria WHERE idcategoria = :idcategoria";
            
        try
        {
            $conn = Banco::conectarBanco();

            $sql = $conn->prepare($comandoSQL);
            $sql->bindParam("idcategoria", $idcategoria);
            $sql->execute();
            $linha = $sql->fetch(PDO::FETCH_ASSOC);
                
            return $linha['descricao'];
        }
        catch(PDOException $e)
        {
            echo "Connection failed: ". $e->getMessage();
        }
        
        return "Nenhuma categoria encontrada";
    }
}
?>
