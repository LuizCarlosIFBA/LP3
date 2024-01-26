<?php
require_once "Banco.php";
require_once "Model/BO/Estado.php";
class EstadoDAO{
    public function pesquisarEstado($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from estado where idestado=:idestado");

            $sql->bindParam("idestado",$id);
            $id = $aux->getIdEstado();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $aux->setNome($linha["nome"]);
                $aux->setSigla($linha["sigla"]);                
            }
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function listarTudo(){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from estado");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaEstado=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $estado = new Estado();
                
                $estado->setIdEstado($linha["idestado"]);
                $estado->setNome($linha["nome"]);
                $estado->setSigla($linha["sigla"]);
                
                $listaEstado[$i] = $estado;
                $i++;
            }
            return $listaEstado;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>