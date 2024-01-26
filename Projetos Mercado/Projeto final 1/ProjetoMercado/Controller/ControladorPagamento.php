<?php
require_once "IControlador.php";
require_once "Model/BO/Pagamento.php";
class ControladorPagamento implements IControlador{
    
    public function processaRequisicao($acao){
        if ($acao=="CC") {
            $cartao = new Cartao();
            $cartao->setNomeProprietario($_POST["nome"]);
            $cartao->setNumeroCartao($_POST["cartao"]);
            $cartao->setBandeira($_POST["bandeira"]);
            $cartao->setMesValidade($_POST["mes"]);
            $cartao->setAnoValidade($_POST["ano"]);
            $cartao->setCvv($_POST["cvv"]);
            $cartao->setCpf($_POST["cpf"]);
            $usuario = new Usuario;
            $cartao->setUsuario($usuario);
            $cartao->getUsuario()->setIdUsuario($_POST["idusuario"]);

            $cartao->incluirCartao();

            $_SESSION["cartao"] = serializeCorreto($cartao);
            $_SESSION["cartaoCadastrado"] = 1;

            header("Location: Confirmacao");
            exit();
        }
        else if ($acao=="ADC") {
            $cartao = new Cartao();
            $cartao->setIdCartao($_POST["idcartao"]);
            $cartao->setNomeProprietario($_POST["nome"]);
            $cartao->setNumeroCartao($_POST["cartao"]);
            $cartao->setBandeira($_POST["bandeira"]);
            $cartao->setMesValidade($_POST["mes"]);
            $cartao->setAnoValidade($_POST["ano"]);
            $cartao->setCvv($_POST["cvv"]);
            $cartao->setCpf($_POST["cpf"]);
            
            $cartao->alterarCartao();

            $_SESSION["cartao"] = serializeCorreto($cartao);

            header("Location: Confirmacao");
            exit();
        }
        else if ($acao=="RP") {
            $pagamento = new Pagamento();

            if (isset($_SESSION["valorFinal"])){
                $valorFinal = $_SESSION["valorFinal"];
            }
            
            $pagamento->setValorTotal($valorFinal);
            $pagamento->setCartao(unserialize($_SESSION["cartao"]));
            $pagamento->setPedido(unserialize($_SESSION["pedido"]));
            
            $pagamento->incluirPagamento();

            $_SESSION["pagamento"] = serializeCorreto($pagamento);

            header("Location: RegistrarSituacao");
            exit();
        }     
    }

} 
?>