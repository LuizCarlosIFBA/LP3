<?php
require_once "Banco.php";
require_once "Model/BO/Cidade.php";
class CidadeDAO{
    public function pesquisarCidade($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from cidade where idcidade=:idcidade");

            $sql->bindParam("idcidade",$id);
            $id = $aux->getIdCidade();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $estado = new Estado();

                $aux->setNome($linha["nome"]);
                $aux->setEstado($estado);
                $aux->getEstado()->setIdEstado($linha["idestado"]);
            }
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarEstadoCidades($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from cidade where idestado=:idestado");

            $sql->bindParam("idestado",$id);
            $id = $aux->getEstado()->getIdEstado();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaCidade=array();
            $i=0;
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $cidade = new Cidade();
                $estado = new Estado();

                $cidade->setIdCidade($linha["idcidade"]);
                $cidade->setNome($linha["nome"]);
                $cidade->setEstado($estado);
                $cidade->getEstado()->setIdEstado($linha["idestado"]);
                
                $listaCidade[$i] = $cidade;
                $i++;
            }
            return $listaCidade;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function listarTudo(){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from cidade");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaCidade=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $cidade = new Cidade();
                $estado = new Estado();
                
                $cidade->setIdCidade($linha["idcidade"]);
                $cidade->setNome($linha["nome"]);
                $cidade->setEstado($estado);
                $cidade->getEstado()->setIdEstado($linha["idestado"]);
                
                $listaCidade[$i] = $cidade;
                $i++;
            }
            return $listaCidade;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>