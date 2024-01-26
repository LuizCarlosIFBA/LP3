<?php
require_once "Banco.php";
require_once "Model/BO/Produto.php";
class ProdutoDAO{
    public function incluirProduto($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("insert into produto (nome, marca, preco, estoque, idcategoria)
            values (:nome, :marca, :preco, :estoque, :idcategoria)");
            
            $sql->bindParam("nome",$nome);
            $sql->bindParam("marca",$marca);
            $sql->bindParam("preco",$preco);
            $sql->bindParam("estoque",$estoque);
            $sql->bindParam("idcategoria",$idcategoria);
            $nome = $aux->getNome();
            $marca = $aux->getMarca();
            $preco = $aux->getPreco();
            $estoque = $aux->getEstoque();
            $idcategoria = $aux->getCategoria()->getIdCategoria();

            $sql->execute();

            $last_id = $minhaConexao->lastInsertId();
            $aux->setIdProduto($last_id);
            $imagem = $aux->getImagem();

            if($imagem != NULL) {
                $nomeFinal = $last_id.".png";
                
                if (move_uploaded_file($imagem["tmp_name"], $nomeFinal)) {                             
                    $sql = $minhaConexao->prepare("update produto set nome_imagem=:nome_imagem where idproduto=:idproduto");

                    $sql->bindParam("idproduto",$last_id);
                    $sql->bindParam("nome_imagem",$nomeFinal);

                    $sql->execute();
                }
            }
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function excluirProduto($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("delete from produto where idproduto=:idproduto");

            $sql->bindParam("idproduto",$id);
            $id = $aux->getIdProduto();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function alterarProduto($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("update produto set nome=:nome, marca=:marca, preco=:preco, estoque=:estoque, idcategoria=:idcategoria where idproduto=:idproduto");

            $sql->bindParam("idproduto",$id);
            $sql->bindParam("nome",$nome);
            $sql->bindParam("marca",$marca);
            $sql->bindParam("preco",$preco);
            $sql->bindParam("estoque",$estoque);
            $sql->bindParam("idcategoria",$idcategoria);
            $id = $aux->getIdProduto();
            $nome = $aux->getNome();
            $marca = $aux->getMarca();
            $preco = $aux->getPreco();
            $estoque = $aux->getEstoque();
            $idcategoria = $aux->getCategoria()->getIdCategoria();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarProduto($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from produto where idproduto=:idproduto");
            
            $sql->bindParam("idproduto",$id);
            $id = $aux->getIdProduto();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
        
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $categoria = new Categoria();

                $aux->setNome($linha["nome"]);
                $aux->setMarca($linha["marca"]);
                $aux->setPreco($linha["preco"]);
                $aux->setEstoque($linha["estoque"]);
                $aux->setNomeImagem($linha["nome_imagem"]);
                $aux->setCategoria($categoria);
                $aux->getCategoria()->setIdCategoria($linha["idcategoria"]);
            }
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarProdutoNome($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare ("SELECT * FROM produto WHERE nome LIKE :nome");
        
            $sql->bindParam("nome",$nome);
            $nome = $aux->getNome().'%';
        
            $sql->execute();
            $result=$sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaProduto=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $produto = new Produto();
                $categoria = new Categoria();
                
                $produto->setIdProduto($linha["idproduto"]);
                $produto->setNome($linha["nome"]);
                $produto->setMarca($linha["marca"]);
                $produto->setPreco($linha["preco"]);
                $produto->setEstoque($linha["estoque"]);
                $produto->setNomeImagem($linha["nome_imagem"]);
                $produto->setCategoria($categoria);
                $produto->getCategoria()->setIdCategoria($linha["idcategoria"]);

                $listaProduto[$i] = $produto;
                $i++;
            }
            return $listaProduto; 
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarProdutoCategorias($aux){#continuar depois
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare ("SELECT * FROM produto WHERE idcategoria IN idcategoria");
        
            $sql->bindParam("idcategoria",$id);
            $id = $aux->getCategoria()->getIdCategoria();
        
            $sql->execute();
            $result=$sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaProduto=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $produto = new Produto();
                $categoria = new Categoria();
                
                $produto->setIdProduto($linha["idproduto"]);
                $produto->setNome($linha["nome"]);
                $produto->setMarca($linha["marca"]);
                $produto->setPreco($linha["preco"]);
                $produto->setEstoque($linha["estoque"]);
                $produto->setNomeImagem($linha["nome_imagem"]);
                $produto->setCategoria($categoria);
                $produto->getCategoria()->setIdCategoria($linha["idcategoria"]);

                $listaProduto[$i] = $produto;
                $i++;
            }
            return $listaProduto; 
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarRelacionados($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from produto where idcategoria=:idcategoria");
            
            $sql->bindParam("idcategoria",$id);
            $id = $aux->getCategoria()->getIdCategoria();

            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaRelacionado=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $produto = new Produto();
                $categoria = new Categoria();
                
                $produto->setIdProduto($linha["idproduto"]);
                $produto->setNome($linha["nome"]);
                $produto->setMarca($linha["marca"]);
                $produto->setPreco($linha["preco"]);
                $produto->setEstoque($linha["estoque"]);
                $produto->setNomeImagem($linha["nome_imagem"]);
                $produto->setCategoria($categoria); 
                $produto->getCategoria()->setIdCategoria($linha["idcategoria"]);
                
                $listaRelacionado[$i] = $produto;
                $i++;
            }
            return $listaRelacionado;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
    public function listarTudo(){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from produto");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaProduto=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $produto = new Produto();
                $categoria = new Categoria();
                
                $produto->setIdProduto($linha["idproduto"]);
                $produto->setNome($linha["nome"]);
                $produto->setMarca($linha["marca"]);
                $produto->setPreco($linha["preco"]);
                $produto->setEstoque($linha["estoque"]);
                $produto->setNomeImagem($linha["nome_imagem"]);
                $produto->setCategoria($categoria); 
                $produto->getCategoria()->setIdCategoria($linha["idcategoria"]);
                
                $listaProduto[$i] = $produto;
                $i++;
            }
            return $listaProduto;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>