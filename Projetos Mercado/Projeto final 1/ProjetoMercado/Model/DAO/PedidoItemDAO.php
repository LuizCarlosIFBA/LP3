<?php
require_once "Banco.php";
require_once "Model/BO/PedidoItem.php";
class PedidoItemDAO{
    public function incluirItem($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("insert into pedido_item (idpedido, idproduto, qtd_item) values (:idpedido, :idproduto, :qtd_item)");

            $sql->bindParam("idpedido",$idpedido);
            $sql->bindParam("idproduto",$idproduto);
            $sql->bindParam("qtd_item",$qtd);
            $idpedido = $aux->getPedido()->getIdPedido();
            $idproduto = $aux->getProduto()->getIdProduto();
            $qtd = $aux->getQuantidade();

            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function excluirItem($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("delete from pedido_item where idpedido=:idpedido and idproduto=:idproduto");

            $sql->bindParam("idpedido",$idpedido);
            $sql->bindParam("idproduto",$idproduto);
            $idpedido = $aux->getPedido()->getIdPedido();
            $idproduto = $aux->getProduto()->getIdProduto();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    /* Neste caso, vale mais a pena excluir e inserir

    public function alterarItem($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("update pedido_item set idpedido=:idpedido, idproduto=:idproduto where idpedido=:idpedido and idproduto=:idproduto");

            $sql->bindParam("idpedido",$idpedido);
            $sql->bindParam("idproduto",$idproduto);
            $idpedido = $aux->getIdPedido();
            $idproduto = $aux->getIdProduto();
            
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
            $sql = $minhaConexao->prepare("select * from pedido_item where idpedido=:idpedido");

            $sql->bindParam("idpedido",$id);
            $id = $aux->getPedido()->getIdPedido();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            $listaProduto=array();
            $i=0;
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $pi = new PedidoItem();
                $pedido = new Pedido();
                $produto = new Produto();
                
                $pi->setPedido($pedido);
                $pi->setProduto($produto);
                $pi->getPedido()->setIdPedido($linha["idpedido"]);
                $pi->getProduto()->setIdProduto($linha["idproduto"]);
                $pi->setQuantidade($linha["qtd_item"]);
                
                $listaProduto[$i] = $pi;
                $i++;
            }
            return $listaProduto;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarProduto($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from pedido_item where idproduto=:idproduto");

            $sql->bindParam("idproduto",$id);
            $id = $aux->getProduto()->getIdProduto();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaPedido=array();
            $i=0;
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $pi = new PedidoItem();
                $pedido = new Pedido();
                $produto = new Produto();
                
                $pi->setPedido($pedido);
                $pi->setProduto($produto);
                $pi->getPedido()->setIdPedido($linha["idpedido"]);
                $pi->getProduto()->setIdProduto($linha["idproduto"]);
                $pi->setQuantidade($linha["qtd_item"]);
                
                $listaPedido[$i] = $pi;
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
            $sql = $minhaConexao->prepare("select * from pedido_item");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaItem=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $pi = new PedidoItem();
                $pedido = new Pedido();
                $produto = new Produto();
                
                $pi->setPedido($pedido);
                $pi->setProduto($produto);
                $pi->getPedido()->setIdPedido($linha["idpedido"]);
                $pi->getProduto()->setIdProduto($linha["idproduto"]);
                $pi->setQuantidade($linha["qtd_item"]);
                
                $listaItem[$i] = $pi;
                $i++;
            }
            return $listaItem;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>