<?php
require_once "Banco.php";
require_once "Model/BO/PedidoFuncionario.php";
class PedidoFuncionarioDAO{
    public function incluirEntrada($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("insert into pedido_funcionario (idpedido, idfuncionario) values (:idpedido, :idfuncionario)");

            $sql->bindParam("idpedido",$idpedido);
            $sql->bindParam("idfuncionario",$idfuncionario);
            $idpedido = $aux->getPedido()->getIdPedido();
            $idfuncionario = $aux->getFuncionario()->getUsuario()->getIdUsuario();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function excluirEntrada($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("delete from pedido_funcionario where idpedido=:idpedido and idfuncionario=:idfuncionario");

            $sql->bindParam("idpedido",$idpedido);
            $sql->bindParam("idfuncionario",$idfuncionario);
            $idpedido = $aux->getPedido()->getIdPedido();
            $idfuncionario = $aux->getFuncionario()->getUsuario()->getIdUsuario();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    /* Neste caso, vale mais a pena excluir e inserir

    public function alterarEntrada($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("update pedido_funcionario set idpedido=:idpedido, idfuncionario=:idfuncionario where idpedido=:idpedido and idfuncionario=:idfuncionario");

            $sql->bindParam("idpedido",$idpedido);
            $sql->bindParam("idfuncionario",$idfuncionario);
            $idpedido = $aux->getIdPedido();
            $idfuncionario = $aux->getFuncionario()->getUsuario()->getIdUsuario();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
    */

    public function pesquisarPedido($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from pedido_funcionario where idpedido=:idpedido");

            $sql->bindParam("idpedido",$id);
            $id = $aux->getPedido()->getIdPedido();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            $listaFuncionario=array();
            $i=0;
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $pf = new PedidoFuncionario();
                $pedido = new Pedido();
                $funcionario = new Funcionario();
                $usuario = new Usuario();
                
                $pf->setPedido($pedido);
                $pf->setFuncionario($funcionario);
                $pf->getFuncionario()->setUsuario($usuario);
                $pf->getPedido()->setIdPedido($linha["idpedido"]);
                $pf->getFuncionario()->getUsuario()->setIdUsuario($linha["idfuncionario"]);
                
                $listaFuncionario[$i] = $pf;
                $i++;
            }
            return $listaFuncionario;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarFuncionario($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from pedido_funcionario where idfuncionario=:idfuncionario");

            $sql->bindParam("idfuncionario",$id);
            $id = $aux->getFuncionario()->getUsuario()->getIdUsuario();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaPedido=array();
            $i=0;
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $pf = new PedidoFuncionario();
                $pedido = new Pedido();
                $funcionario = new Funcionario();
                $usuario = new Usuario();
                
                $pf->setPedido($pedido);
                $pf->setFuncionario($funcionario);
                $pf->getFuncionario()->setUsuario($usuario);
                $pf->getPedido()->setIdPedido($linha["idpedido"]);
                $pf->getFuncionario()->getUsuario()->setIdUsuario($linha["idfuncionario"]);
                
                $listaPedido[$i] = $pf;
                $i++;
            }
            return $listaPedido;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function listarTudo(){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from pedido_funcionario");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaEntrada=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $pf = new PedidoFuncionario();
                $pedido = new Pedido();
                $funcionario = new Funcionario();
                $usuario = new Usuario();
                
                $pf->setPedido($pedido);
                $pf->setFuncionario($funcionario);
                $pf->getFuncionario()->setUsuario($usuario);
                $pf->getPedido()->setIdPedido($linha["idpedido"]);
                $pf->getFuncionario()->getUsuario()->setIdUsuario($linha["idfuncionario"]);
                
                $listaEntrada[$i] = $pf;
                $i++;
            }
            return $listaEntrada;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>