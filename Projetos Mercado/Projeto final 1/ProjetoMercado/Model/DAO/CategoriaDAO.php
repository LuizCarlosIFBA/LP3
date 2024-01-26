<?php
require_once "Banco.php";
require_once "Model/BO/Categoria.php";
class CategoriaDAO{
    public function incluirCategoria($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("insert into categoria (nome) values (:nome)");

            $sql->bindParam("nome",$nome);
            $nome = $aux->getNome();
           
            $sql->execute();

            $last_id = $minhaConexao->lastInsertId();
            $aux->setIdCategoria($last_id);
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function excluirCategoria($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("delete from categoria where idcategoria=:idcategoria");

            $sql->bindParam("idcategoria",$id);
            $id = $aux->getIdCategoria();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function alterarCategoria($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("update categoria set nome=:nome where idcategoria=:idcategoria");

            $sql->bindParam("idcategoria",$id);
            $sql->bindParam("nome",$nome);
            $id = $aux->getIdCategoria();
            $nome = $aux->getNome();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarCategoria($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from categoria where idcategoria=:idcategoria");

            $sql->bindParam("idcategoria",$id);
            $id = $aux->getIdCategoria();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $aux->setNome($linha["nome"]);
            }
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function listarTudo(){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from categoria");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaCategoria=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $categoria = new Categoria();
                
                $categoria->setIdCategoria($linha["idcategoria"]);
                $categoria->setNome($linha["nome"]);
                
                $listaCategoria[$i] = $categoria;
                $i++;
            }
            return $listaCategoria;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>