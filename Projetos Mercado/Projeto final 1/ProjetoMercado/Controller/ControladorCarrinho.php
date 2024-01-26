<?php
require_once "IControlador.php";
require_once "Model/BO/CarrinhoSession.php";
require_once "Model/BO/CarrinhoItem.php";
class ControladorCarrinho implements IControlador{
    
    public function processaRequisicao($acao){
        if ($acao=="AC") {
            $carrinhoSession = new CarrinhoSession();

            if (isset($_POST["idproduto"]) && preg_match("/^[0-9]+/", $_POST["idproduto"])){
                $itemCarrinho = new CarrinhoItem($_POST["idproduto"], 1);
                $carrinhoSession->adicionarItem($itemCarrinho);
            }
            header("Location:Carrinho");            
            exit();
        }
        else if ($acao=="RC") {
            $carrinhoSession = new CarrinhoSession();

            if (isset($_POST["idproduto"]) && preg_match("/^[0-9]+/", $_POST["idproduto"])){
                $carrinhoSession->removerItem($_POST["idproduto"]);
            }
            header("Location:Carrinho"); 
            exit();
        }
        else if ($acao=="RTC") {
            $carrinhoSession = new CarrinhoSession();
            $carrinhoSession->removerTudo();
            header("Location:Carrinho");
            exit();
        }
        else if ($acao=="AQ") {
            $carrinhoSession = new CarrinhoSession();

            if (isset($_POST["idproduto"]) && preg_match("/^[0-9]+/", $_POST["idproduto"])){
                $carrinhoSession->atualizarQuantidade($_POST["idproduto"]);
            }
            header("Location:Carrinho");
            exit();
        }
        else if ($acao=="AD") {
            $carrinhoSession = new CarrinhoSession();

            if (isset($_POST["cupom"])) { 
                $carrinhoSession->aplicarCupom($_POST["cupom"]);
            }
            header("Location:Carrinho");
            exit();
        }        
    }

}   
?>