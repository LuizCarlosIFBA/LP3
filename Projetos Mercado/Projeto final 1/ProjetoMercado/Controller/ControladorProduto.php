<?php
require_once "IControlador.php";
require_once "Model/BO/Produto.php";
class ControladorProduto implements IControlador{
    
    public function processaRequisicao($acao){
        if ($acao=="B") {
            $produto = new Produto();
            $produto->setNome($_POST["nome"]);
            $lista = $produto->pesquisarProdutoNome();

            $_SESSION["listaprodutos"] = serializeCorreto($lista);

            header("Location: ListaProdutos");
            exit();
        }
        else if ($acao=="LP") {
            $produto = new Produto();
            $lista = $produto->listarTudo();

            $_SESSION["listaprodutos"] = serializeCorreto($lista);

            header("Location: ListaProdutos");
            exit();
        }
        else if ($acao=="PP") {
            $produto = new Produto();
            $produto->setIdProduto($_POST["idproduto"]);
            $produto->pesquisarProduto();

            $_SESSION["produto"] = serializeCorreto($produto);
            $_SESSION["categoria"] = serializeCorreto($produto->getCategoria());

            header("Location: PesquisarCategoria");
            exit();
        }
        else if ($acao=="PR") {
            if (isset($_SESSION["produto"])) {
                $produto = new Produto();
                $produto = unserialize($_SESSION["produto"]);
                $lista = $produto->pesquisarRelacionados();

                $_SESSION["relacionados"] = serializeCorreto($lista);

                header("Location: Produto");
                exit();
            }
        }     
    }
}   
?>