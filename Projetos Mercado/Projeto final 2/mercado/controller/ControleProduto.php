<?php
    require_once "model/Produto.php";
    require_once "model/CategoriaDAO.php";
    require_once "model/Banco.php";

    class ControleProduto
    {

        public static function processa($idproduto)
        {
            $produto = new Produto();
            $produto->setIDProduto($idproduto);
            $produto->setDadosProduto();
            return $produto;
        }

        public static function getNomeCategoria($idcategoria)
        {
            return CategoriaDAO::getNomeCategoria($idcategoria);
        }

        public static function listaMarca($idcategoria)
        {
            $arrayMarca = array();

            $comandoSQL = 
            "SELECT m.idmarca, m.descricao 
            FROM marca AS m
            INNER JOIN produto p ON p.marca_idmarca = m.idmarca
            INNER JOIN categoria ON categoria.idcategoria = p.categoria_idcategoria
            WHERE categoria_idcategoria = :idcategoria";
                
            try
            {
                $conn = Banco::conectarBanco();

                $sql = $conn->prepare($comandoSQL);
                $sql->bindParam("idcategoria", $idcategoria);
                $sql->execute();
                
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC))
                    array_push($arrayMarca, array ($linha['idmarca'], $linha['descricao']));
                    
                return $arrayMarca;
            }
            catch(PDOException $e)
            {
                echo "Connection failed: ". $e->getMessage();
            }
            return $arrayMarca;
        }

        public static function listaProduto($promocao, $idcategoria)
        {
            return ProdutoDAO::getListaProduto($promocao, $idcategoria);
        }
    }
?>