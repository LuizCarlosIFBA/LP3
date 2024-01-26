<?php
require_once "Banco.php";
require_once "Model/BO/Pedido.php";
class PedidoDAO{
    public function incluirPedido($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("insert into pedido (idusuario_cliente) values (:idusuario_cliente)");

            $sql->bindParam("idusuario_cliente",$idcliente);
            $idcliente = $aux->getCliente()->getIdUsuario();
            
            $sql->execute();

            $last_id = $minhaConexao->lastInsertId();
            $aux->setIdPedido($last_id);
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function excluirPedido($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("delete from pedido where idpedido=:idpedido");

            $sql->bindParam("idpedido",$id);
            $id = $aux->getIdPedido();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function alterarPedido($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("update pedido set idusuario_cliente=:idusuario_cliente where idpedido=:idpedido");

            $sql->bindParam("idpedido",$id);
            $sql->bindParam("idusuario_cliente",$idcliente);
            $id = $aux->getIdPedido();
            $idcliente = $aux->getCliente()->getIdUsuario();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarPedido($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from pedido where idpedido=:idpedido");

            $sql->bindParam("idpedido",$id);
            $id = $aux->getIdPedido();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $usuario = new Usuario();

                $aux->setCliente($usuario);
                $aux->getCliente()->setIdUsuario($linha["idusuario_cliente"]);
            }
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function listarTudo(){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from pedido");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaPedido=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $pedido = new Pedido();
                $usuario = new Usuario();
                
                $pedido->setIdPedido($linha["idpedido"]);
                $pedido->setCliente($usuario);
                $pedido->getCliente()->setIdUsuario($linha["idusuario_cliente"]);
                
                $listaPedido[$i] = $pedido;
                $i++;
            }
            return $listaPedido;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>