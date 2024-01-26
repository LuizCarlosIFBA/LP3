<?php
require_once "Banco.php";
require_once "Model/BO/PedidoSituacao.php";
class PedidoSituacaoDAO{
    public function incluirEntrada($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("insert into pedido_situacao (idpedido, idsituacao, data_atualizacao) values (:idpedido, :idsituacao, :data_atualizacao)");

            $sql->bindParam("idpedido",$idpedido);
            $sql->bindParam("idsituacao",$idsituacao);
            $sql->bindParam("data_atualizacao",$data);
            $idpedido = $aux->getPedido()->getIdPedido();
            $idsituacao = $aux->getSituacao()->getIdSituacao();
            $data = $aux->getDataAtualizacao();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function excluirEntrada($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("delete from pedido_situacao where idpedido=:idpedido and idsituacao=:idsituacao");

            $sql->bindParam("idpedido",$idpedido);
            $sql->bindParam("idsituacao",$idsituacao);
            $idpedido = $aux->getPedido()->getIdPedido();
            $idsituacao = $aux->getSituacao()->getIdSituacao();
            
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
            $sql = $minhaConexao->prepare("update pedido_situacao set idpedido=:idpedido, idsituacao=:idsituacao where idpedido=:idpedido and idsituacao=:idsituacao");

            $sql->bindParam("idpedido",$idpedido);
            $sql->bindParam("idsituacao",$idsituacao);
            $idpedido = $aux->getIdPedido();
            $idsituacao = $aux->getIdSituacao();
            
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
            $sql = $minhaConexao->prepare("select * from pedido_situacao where idpedido=:idpedido");

            $sql->bindParam("idpedido",$id);
            $id = $aux->getPedido()->getIdPedido();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            $listaSituacao=array();
            $i=0;
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $ps = new PedidoSituacao();
                $pedido = new Pedido();
                $situacao = new Situacao();
                
                $ps->setPedido($pedido);
                $ps->setSituacao($situacao);
                $ps->getPedido()->setIdPedido($linha["idpedido"]);
                $ps->getSituacao()->setIdSituacao($linha["idsituacao"]);
                $ps->setDataAtualizacao($linha["data_atualizacao"]);
                
                $listaSituacao[$i] = $ps;
                $i++;
            }
            return $listaSituacao;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarSituacao($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from pedido_situacao where idsituacao=:idsituacao");

            $sql->bindParam("idsituacao",$id);
            $id = $aux->getSituacao()->getIdSituacao();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaPedido=array();
            $i=0;
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $ps = new PedidoSituacao();
                $pedido = new Pedido();
                $situacao = new Situacao();
                
                $ps->setPedido($pedido);
                $ps->setSituacao($situacao);
                $ps->getPedido()->setIdPedido($linha["idpedido"]);
                $ps->getSituacao()->setIdSituacao($linha["idsituacao"]);
                $ps->setDataAtualizacao($linha["data_atualizacao"]);
                
                $listaPedido[$i] = $ps;
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
            $sql = $minhaConexao->prepare("select * from pedido_situacao");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaEntrada=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $ps = new PedidoSituacao();
                $pedido = new Pedido();
                $situacao = new Situacao();
                
                $ps->setPedido($pedido);
                $ps->setSituacao($situacao); 
                $ps->getPedido()->setIdPedido($linha["idpedido"]);
                $ps->getSituacao()->setIdSituacao($linha["idsituacao"]);
                $ps->setDataAtualizacao($linha["data_atualizacao"]);
                
                $listaEntrada[$i] = $ps;
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