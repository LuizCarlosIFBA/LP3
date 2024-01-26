<?php
require_once "Banco.php";
require_once "Model/BO/Feedback.php";
class FeedbackDAO{
    public function incluirFeedback($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("insert into feedback (estrelas, opiniao, idpedido) values (:estrelas, :opiniao, :idpedido)");

            $sql->bindParam("estrelas",$estrelas);
            $sql->bindParam("opiniao",$opiniao);
            $sql->bindParam("idpedido",$idpedido);
            $estrelas = $aux->getEstrelas();
            $opiniao = $aux->getOpiniao();
            $idpedido = $aux->getPedido()->getIdPedido();
            
            $sql->execute();

            $last_id = $minhaConexao->lastInsertId();
            $aux->setIdFeedback($last_id);
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function excluirFeedback($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("delete from feedback where idfeedback=:idfeedback");

            $sql->bindParam("idfeedback",$id);
            $id = $aux->getIdFeedback();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function alterarFeedback($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("update feedback set estrelas=:estrelas, opiniao=:opiniao, idpedido=:idpedido where idfeedback=:idfeedback");

            $sql->bindParam("idfeedback",$id);
            $sql->bindParam("estrelas",$estrelas);
            $sql->bindParam("opiniao",$opiniao);
            $sql->bindParam("idpedido",$idpedido);
            $id = $aux->getIdFeedback();
            $estrelas = $aux->getEstrelas();
            $opiniao = $aux->getOpiniao();
            $idpedido = $aux->getPedido()->getIdPedido();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarFeedback($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from feedback where idfeedback=:idfeedback");

            $sql->bindParam("idfeedback",$id);
            $id = $aux->getIdFeedback();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $pedido = new Pedido();

                $aux->setEstrelas($linha["estrelas"]);
                $aux->setOpiniao($linha["opiniao"]);
                $aux->setPedido($pedido);
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
            $sql = $minhaConexao->prepare("select * from feedback");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaFeedback=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $feedback = new Feedback();
                $pedido = new Pedido();
                
                $feedback->setIdFeedback($linha["idfeedback"]);
                $feedback->setEstrelas($linha["estrelas"]);
                $feedback->setOpiniao($linha["opiniao"]);
                $feedback->setPedido($pedido);
                $feedback->getPedido()->setIdPedido($linha["idpedido"]);
                
                $listaFeedback[$i] = $feedback;
                $i++;
            }
            return $listaFeedback;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>