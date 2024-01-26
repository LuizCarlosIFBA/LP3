<?php
//esta classe cria um carrinho contendo uma lista de itens do carrinho
require_once "ItemCarrinho.php";
class CarrinhoSessao
{
    private $itens = array();

    /**
     * Cria sessão do carrinho retornando sessão salva com itens ou criando nova lista de itens zerada.
     */
    public function __construct()
    {
        $this->itens = $this->restaura();
    }

    /**
     * Retorna TRUE ou FALSE se existe item com $id no carrinho
     */
    public function estaNoCarrinho($id)
    {
        return isset($this->itens[$id]);
    }

    /**
     * Adiciona um novo $item no carrinho conforme seu $id
     * Caso já exista na lista, incrementa +1
     */
    public function adicionar($item)
    {
        $id = $item->getProduto()->getIDProduto();
        if (!$this->estaNoCarrinho($id))
            $this->itens[$id] = $item;
        else{
            if($item->getQuantidade()>1){
                $this->itens[$id]->setQuantidade($this->itens[$id]->getQuantidade() + $item->getQuantidade());
            }else
            $this->itens[$id]->setQuantidade($this->itens[$id]->getQuantidade() + 1);
        }
    }

    /**
     * Atualiza item do carrinho conforme o $id e informações do objeto $item.
     * Caso a nova quantidade seja igual a 0, remova do carrinho.
     */
    public function atualizar($item)
    {
        $id = $item->getProduto()->getIDProduto();
        if ($this->estaNoCarrinho($id)) {
            if ($item->getquantidade() == 0) {
                $this->apagar($id);
                return;
            }
            $this->itens[$id] = $item;
        }
    }
    /**
     * Excluir item do carrinho com base no seu $id
     */
    public function apagar($id)
    {
        if ($this->estaNoCarrinho($id))
            unset($this->itens[$id]);
    }

    /**
     * Calcula valor da compra SEM descontos da compra Produto * Quantidade
     */
    public function getSubtotal()
    {
        // retorna o total de todos os produtos do carrinho
        $total = 0;
        foreach ($this->itens as $item) {
            $total += $item->getSubtotal();
        }
        return $total;
    }

    /**
     * Calcula valor da compra COM descontos da compra Produto * Quantidade
     */
    public function getTotal()
    {
        $total = 0;
        foreach ($this->itens as $item) {
            $total += $item->getSubtotalComDesconto();
        }
        return $total;
    }

    /**
     * Retorna o array de itens do carrinho
     */
    public function getItensCarrinho()
    {
        return $this->itens;
    }

    /**
     * Joga o array de itens do carrinho para a sessão
     */
    public function __destruct()
    {
        $_SESSION['carrinhoSessao'] = serialize($this->itens);
    }

    /**
     * Se houver itens salvos na sessão, retorne o array de itens.
     * Caso não exista, crie um array vazio e retorne.
     */
    public function restaura()
    {
        if (isset($_SESSION['carrinhoSessao'])) {
            return unserialize($_SESSION['carrinhoSessao']);
        } else
            return array();

    }
}

?>