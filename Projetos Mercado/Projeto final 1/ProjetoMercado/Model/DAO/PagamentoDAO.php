<?php
require_once "Banco.php";
require_once "Model/BO/Pagamento.php";
class PagamentoDAO{
    public function incluirPagamento($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("insert into pagamento (valor_total, idcartao, idpedido) values (:valor_total, :idcartao, :idpedido)");

            $sql->bindParam("valor_total",$valor);
            $sql->bindParam("idcartao",$idcartao);
            $sql->bindParam("idpedido",$idpedido);
            $valor = $aux->getValorTotal();
            $idcartao = $aux->getCartao()->getIdCartao();
            $idpedido = $aux->getPedido()->getIdPedido();
            
            $sql->execute();

            $last_id = $minhaConexao->lastInsertId();
            $aux->setIdPagamento($last_id);
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function excluirPagamento($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("delete from pagamento where idpagamento=:idpagamento");

            $sql->bindParam("idpagamento",$id);
            $id = $aux->getIdPagamento();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function alterarPagamento($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("update pagamento set valor_total=:valor_total, idcartao=:idcartao, idpedido=:idpedido where idpagamento=:idpagamento");

            $sql->bindParam("idpagamento",$id);
            $sql->bindParam("valor_total",$valor);
            $sql->bindParam("idcartao",$idcartao);
            $sql->bindParam("idpedido",$idpedido);
            $id = $aux->getIdPagamento();
            $valor = $aux->getValorTotal();
            $idcartao = $aux->getCartao()->getIdCartao();
            $idpedido = $aux->getPedido()->getIdPedido();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarPagamento($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from pagamento where idpagamento=:idpagamento");

            $sql->bindParam("idpagamento",$id);
            $id = $aux->getIdPagamento();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $cartao = new Cartao();
                $pedido = new Pedido();

                $aux->setValorTotal($linha["valor_total"]);
                $aux->setCartao($cartao);
                $aux->setPedido($pedido);
                $aux->getCartao()->setIdCartao($linha["idcartao"]);
                $aux->getPedido()->setIdPedido($linha["idpedido"]);
            }
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function listarTudo(){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from pagamento");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaPagamento=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $pagamento = new Pagamento();
                $cartao = new Cartao();
                $pedido = new Pedido();
                
                $pagamento->setIdPagamento($linha["idpagamento"]);
                $pagamento->setValorTotal($linha["valor_total"]);
                $pagamento->setCartao($cartao);
                $pagamento->setPedido($pedido);
                $pagamento->getCartao()->setIdCartao($linha["idcartao"]);
                $pagamento->getPedido()->setIdPedido($linha["idpedido"]);

                $listaPagamento[$i] = $pagamento;
                $i++;
            }
            return $listaPagamento;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>