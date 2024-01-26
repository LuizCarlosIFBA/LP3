<?php
require_once "Banco.php";
require_once "Model/BO/Funcionario.php";
class FuncionarioDAO{
    public function incluirFuncionario($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("insert into funcionario (idfuncionario, cargo, salario, data_contratacao) values (:idfuncionario, :cargo, :salario, :data_contratacao)");
            
            $sql->bindParam("idfuncionario",$id); 
            $sql->bindParam("cargo",$cargo);
            $sql->bindParam("salario",$salario);
            $sql->bindParam("data_contratacao",$data);
            $id = $aux->getUsuario()->getIdUsuario();
            $cargo = $aux->getCargo();
            $salario = $aux->getSalario();
            $data = $aux->getDataContratacao();
                  
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function excluirFuncionario($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("delete from funcionario where idfuncionario=:idfuncionario");

            $sql->bindParam("idfuncionario",$id);
            $id = $aux->getUsuario()->getIdUsuario();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function alterarFuncionario($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("update funcionario set cargo=:cargo, salario=:salario, data_contratacao=:data_contratacao where idfuncionario=:idfuncionario");

            $sql->bindParam("idfuncionario",$id);
            $sql->bindParam("cargo",$cargo);
            $sql->bindParam("salario",$salario);
            $sql->bindParam("data_contratacao",$data);
            $id = $aux->getUsuario()->getIdUsuario();
            $cargo = $aux->getCargo();
            $salario = $aux->getSalario();
            $data = $aux->getDataContratacao();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarFuncionario($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from funcionario where idfuncionario=:idfuncionario");
            
            $sql->bindParam("idfuncionario",$id);
            $id = $aux->getUsuario()->getIdUsuario();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $aux->setCargo($linha["cargo"]);
                $aux->setSalario($linha["salario"]);
                $aux->setDataContratacao($linha["data_contratacao"]);
            }
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function listarTudo(){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from funcionario;");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaFuncionario=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $funcionario = new Funcionario();
                $usuario = new Usuario();
                
                $funcionario->setUsuario($usuario);
                $funcionario->getUsuario()->setIdUsuario($linha["idfuncionario"]);
                $funcionario->setCargo($linha["cargo"]);
                $funcionario->setSalario($linha["salario"]);
                $funcionario->setDataContratacao($linha["data_contratacao"]);
                
                $listaFuncionario[$i] = $funcionario;
                $i++;
            }
            return $listaFuncionario;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>