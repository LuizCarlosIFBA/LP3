<?php
class ControleCarrinho{
    private $CarrinhoSessao;  
    
    public function __construct($CarrinhoSessao){
        $this->CarrinhoSessao = $CarrinhoSessao;
    }

    /**
     * Apaga item do carrinho
     */
    public function ApagaItemCarrinho(){
        if (isset($_POST['id']) && preg_match("/^[0-9]+/",$_POST['id'])){       
            $this->CarrinhoSessao->apagar($_POST['id']);
        }
        header('Location:Carrinho', true,302);
    }

    /**
     * Altera a quantidade de itens do carrinho
     */
    public function AlteraQuantidadeCarrinho(){
        if (isset($_POST['id']) && preg_match("/^[0-9]+/",$_POST['id'])) {
            //cria o objeto itemCarrinho
            $itemCarrinho = new ItemCarrinho($_POST['id'],$_POST['quantidade']);
            //atualiza o itemCarrinho no carrinho
            $this->CarrinhoSessao->atualizar($itemCarrinho);
        }
        header('Location:Carrinho', true,302);
    }

    /**
     * Adiciona item do carrinho
     */
    public function AdicionaItemCarrinho(){
        if (isset($_POST['id']) && isset($_POST['qtd']) && preg_match("/^[0-9]+/",$_POST['id'])){
            //cria o objeto itemCarrinho
            $itemCarrinho = new ItemCarrinho($_POST['id'], $_POST['qtd']);
            //adiciona o itemCarrinho no carrinho
            $this->CarrinhoSessao->adicionar($itemCarrinho);
        }
        header('Location:Carrinho', true,302);

    }

    /**
     * Adiciona item do carrinho por compra
     */
    public function AdicionaItemCarrinhoPedido($listaprodutos){
        foreach($listaprodutos as $produto){
            $itemCarrinho = new ItemCarrinho($produto->getIdproduto(), $produto->getQuantidade());
            $this->CarrinhoSessao->adicionar($itemCarrinho);
        }
        ?>
            <script type="text/javascript">
                window.location.href = 'Carrinho';
            </script>
        <?php
    }

    /**
     * Lista itens na pagina do carrinho
     */
    public function ListarItensCarrinho(){
        $itensCarrinho = $this->CarrinhoSessao->getItensCarrinho();
        $carrinho = $this->CarrinhoSessao;
        require "View/Carrinho.php";
    }
}
?>