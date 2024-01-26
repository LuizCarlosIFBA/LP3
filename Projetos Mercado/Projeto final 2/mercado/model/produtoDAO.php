<?php
require_once "model/Banco.php";
require_once "model/Produto.php";
class ProdutoDAO
{
    /**
     * Faz uma consulta dos dados de um produto conforme seu idproduto e preenche o objeto $produto
     */
    public static function setDadosProduto($idproduto, $produto)
    {
        $conn = Banco::conectarBanco();

        $sql = $conn->prepare 
        ("SELECT p.nome, p.imagem, p.valor, p.descricao, c.descricao as categoria, p.tipo, p.embalagem, p.peso, m.descricao as marca, p.desconto
          FROM produto AS p
          INNER JOIN marca AS m ON m.idmarca = p.marca_idmarca
          INNER JOIN categoria AS c ON c.idcategoria = p.categoria_idcategoria
          WHERE idproduto = :idproduto;");
        $sql->bindParam("idproduto", $idproduto);
        $sql->execute();

        $result = $sql->fetch(PDO::FETCH_ASSOC);

        $produto->setNome($result['nome']);
        $produto->setImagem($result['imagem']);
        $produto->setValor($result['valor']);
        $produto->setDesconto($result['desconto']);
        $produto->setDescricao($result['descricao']);
        $produto->setCategoria($result['categoria']);
        $produto->setTipo($result['tipo']);
        $produto->setEmbalagem($result['embalagem']);
        $produto->setPeso($result['peso']);
        $produto->setMarca($result['marca']);
    }
    /**
     * Faz uma consulta no banco preenchendo um Array de produtos cadastrados.
     * 
     * Os produtos do select pode ser filtrado por promoção e/ou categoria.
     ** Para listar apenas os que tiverem promoção, $promocao = 1;
     ** Para listar apenas produtos de determinada categoria, $idcategoria = idcategoria cadastrado no banco.;
     */
    public static function getListaProduto($promocao, $idcategoria)
    {
        $arrayProduto = array();

            $comandoSQL = "SELECT nome, imagem, valor, desconto, idproduto FROM produto";
            
            if($promocao == 1)
            {
                $comandoSQL = $comandoSQL . " WHERE desconto != 0";
                if($idcategoria != 0)
                    $comandoSQL = $comandoSQL . " and categoria_idcategoria = :idcategoria";
            }
            else if($idcategoria != 0)
                $comandoSQL = $comandoSQL . " WHERE categoria_idcategoria = :idcategoria";
                
            try
            {
                $conn = Banco::conectarBanco();

                $sql = $conn->prepare($comandoSQL);

                if($idcategoria != 0)
                    $sql->bindParam("idcategoria", $idcategoria);
                $sql->execute();
                
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC))
                {
                    $produto = new Produto();
                    
                    $produto->setNome($linha['nome']);
                    $produto->setImagem($linha['imagem']);
                    $produto->setValor($linha['valor']);
                    $produto->setDesconto($linha['desconto']);
                    $produto->setIDProduto($linha['idproduto']);

                    array_push($arrayProduto, $produto);  
                }

                return $arrayProduto;
            }
            catch(PDOException $e)
            {
                echo "Connection failed: ". $e->getMessage();
            }
            return $arrayProduto;
    }
}
?>
