<?php
require_once "Banco.php";
require_once "Model/BO/Situacao.php";
class SituacaoDAO{
    public function incluirSituacao($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("insert into situacao (nome) values (:nome)");

            $sql->bindParam("nome",$nome);
            $nome = $aux->getNome();
            
            $sql->execute();

            $last_id = $minhaConexao->lastInsertId();
            $aux->setIdSituacao($last_id);
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function excluirSituacao($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("delete from situacao where idsituacao=:idsituacao");

            $sql->bindParam("idsituacao",$id);
            $id = $aux->getIdSituacao();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function alterarSituacao($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("update situacao set nome=:nome where idsituacao=:idsituacao");

            $sql->bindParam("idsituacao",$id);
            $sql->bindParam("nome",$nome);
            $id = $aux->getIdSituacao();
            $nome = $aux->getNome();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarSituacao($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from situacao where idsituacao=:idsituacao");

            $sql->bindParam("idsituacao",$id);
            $id = $aux->getIdSituacao();
            
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
            $sql = $minhaConexao->prepare("select * from situacao");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaSituacao=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $situacao = new Situacao();
                
                $situacao->setIdSituacao($linha["idsituacao"]);
                $situacao->setNome($linha["nome"]);
                
                $listaSituacao[$i] = $situacao;
                $i++;
            }
            return $listaSituacao;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>