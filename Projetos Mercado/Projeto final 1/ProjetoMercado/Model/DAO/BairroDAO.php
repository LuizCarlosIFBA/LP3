<?php
require_once "Banco.php";
require_once "Model/BO/Bairro.php";
class BairroDAO{
    public function pesquisarBairro($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from bairro where idbairro=:idbairro");

            $sql->bindParam("idbairro",$id);
            $id = $aux->getIdBairro();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $cidade = new Cidade();

                $aux->setNome($linha["nome"]);
                $aux->setCidade($cidade);
                $aux->getCidade()->setIdCidade($linha["idcidade"]);
            }
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarCidadeBairros($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from bairro where idcidade=:idcidade");

            $sql->bindParam("idcidade",$id);
            $id = $aux->getCidade()->getIdCidade();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaBairro=array();
            $i=0;
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $bairro = new Bairro();
                $cidade = new Cidade();

                $bairro->setIdBairro($linha["idbairro"]);
                $bairro->setNome($linha["nome"]);
                $bairro->setCidade($cidade);
                $bairro->getCidade()->setIdCidade($linha["idcidade"]);
                
                $listaBairro[$i] = $bairro;
                $i++;
            }
            return $listaBairro;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function listarTudo(){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from bairro");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaBairro=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $bairro = new Bairro();
                $cidade = new Cidade();
                
                $bairro->setIdBairro($linha["idbairro"]);
                $bairro->setNome($linha["nome"]);
                $bairro->setCidade($cidade);
                $bairro->getCidade()->setIdCidade($linha["idcidade"]);
                
                $listaBairro[$i] = $bairro;
                $i++;
            }
            return $listaBairro;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>