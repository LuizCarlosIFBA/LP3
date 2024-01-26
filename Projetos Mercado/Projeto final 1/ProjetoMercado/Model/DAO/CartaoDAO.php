<?php
require_once "Banco.php";
require_once "Model/BO/Cartao.php";
class CartaoDAO{
    public function incluirCartao($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("insert into cartao (nome_proprietario, numero_cartao, bandeira, mes_validade, ano_validade, cvv, cpf, idusuario) values (:nome_proprietario, :numero_cartao, :bandeira, :mes_validade, :ano_validade, :cvv, :cpf, :idusuario)");

            $sql->bindParam("nome_proprietario",$nome);
            $sql->bindParam("numero_cartao",$numero);
            $sql->bindParam("bandeira",$bandeira);
            $sql->bindParam("mes_validade",$mes);
            $sql->bindParam("ano_validade",$ano);
            $sql->bindParam("cvv",$cvv);
            $sql->bindParam("cpf",$cpf);
            $sql->bindParam("idusuario",$idusuario);
            $nome = $aux->getNomeProprietario();
            $numero = $aux->getNumeroCartao();
            $bandeira = $aux->getBandeira();
            $mes = $aux->getMesValidade();
            $ano = $aux->getAnoValidade();
            $cvv = $aux->getCvv();
            $cpf = $aux->getCpf();
            $idusuario = $aux->getUsuario()->getIdUsuario();
           
            $sql->execute();

            $last_id = $minhaConexao->lastInsertId();
            $aux->setIdCartao($last_id);
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function excluirCartao($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("delete from cartao where idcartao=:idcartao");

            $sql->bindParam("idcartao",$id);
            $id = $aux->getIdCartao();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function alterarCartao($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("update cartao set nome_proprietario=:nome_proprietario, numero_cartao=:numero_cartao, bandeira=:bandeira, mes_validade=:mes_validade, ano_validade=:ano_validade, cvv=:cvv, cpf=:cpf where idcartao=:idcartao");

            $sql->bindParam("idcartao",$id);
            $sql->bindParam("nome_proprietario",$nome);
            $sql->bindParam("numero_cartao",$numero);
            $sql->bindParam("bandeira",$bandeira);
            $sql->bindParam("mes_validade",$mes);
            $sql->bindParam("ano_validade",$ano);
            $sql->bindParam("cvv",$cvv);
            $sql->bindParam("cpf",$cpf);
            $id = $aux->getIdCartao();
            $nome = $aux->getNomeProprietario();
            $numero = $aux->getNumeroCartao();
            $bandeira = $aux->getBandeira();
            $mes = $aux->getMesValidade();
            $ano = $aux->getAnoValidade();
            $cvv = $aux->getCvv();
            $cpf = $aux->getCpf();
            
            $sql->execute();
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function pesquisarCartao($aux){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from cartao where idcartao=:idcartao");

            $sql->bindParam("idcartao",$id);
            $id = $aux->getIdCartao();
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                $usuario = new Usuario();

                $aux->setNomeProprietario($linha["nome_proprietario"]);
                $aux->setNumeroCartao($linha["numero_cartao"]);
                $aux->setBandeira($linha["bandeira"]);
                $aux->setMesValidade($linha["mes_validade"]);
                $aux->setAnoValidade($linha["ano_validade"]);
                $aux->setCvv($linha["cvv"]);
                $aux->setCpf($linha["cpf"]);
                $aux->setUsuario($usuario);
                $aux->getUsuario()->setIdUsuario($linha["idusuario"]);
            }
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }

    public function listarTudo(){
        try{
            $minhaConexao = Banco::conectar();
            $sql = $minhaConexao->prepare("select * from cartao");
            
            $sql->execute();
            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $listaCartao=array();
            $i=0;

            while ($linha = $sql->fetch(PDO::FETCH_ASSOC)){
                $cartao = new Cartao();
                $usuario = new Usuario();
                
                $cartao->setIdCartao($linha["idcartao"]);
                $cartao->setNomeProprietario($linha["nome_proprietario"]);
                $cartao->setNumeroCartao($linha["numero_cartao"]);
                $cartao->setBandeira($linha["bandeira"]);
                $cartao->setMesValidade($linha["mes_validade"]);
                $cartao->setAnoValidade($linha["ano_validade"]);
                $cartao->setCvv($linha["cvv"]);
                $cartao->setCpf($linha["cpf"]);
                $cartao->setUsuario($usuario);
                $cartao->getUsuario()->setIdUsuario($linha["idusuario"]);
                
                $listaCartao[$i] = $cartao;
                $i++;
            }
            return $listaCartao;
        }
        catch(PDOException $e){
            echo "Conexão falhou: ". $e->getMessage();
        }
    }
}

?>