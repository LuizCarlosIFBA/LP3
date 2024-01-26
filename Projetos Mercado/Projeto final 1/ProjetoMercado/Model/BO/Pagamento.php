<?php
require_once "Model/DAO/PagamentoDAO.php";
require_once "Cartao.php";
require_once "Pedido.php";
class Pagamento{
    private $idpagamento;
    private $valor_total;
    private $cartao;
    private $pedido;
    

    public function setIdPagamento($id){
        $this->idpagamento = $id;
    }
    public function setValorTotal($valor){
        $this->valor_total = $valor;
    }
    public function setCartao($cartao){
        $this->cartao = $cartao;
    }
    public function setPedido($pedido){
        $this->pedido = $pedido;
    }

    public function getIdPagamento(){
        return $this->idpagamento;
    }
    public function getValorTotal(){
        return $this->valor_total;
    }
    public function getCartao(){
        return $this->cartao;
    }
    public function getPedido(){
        return $this->pedido;
    }


    public function incluirPagamento(){
        $pagamentoDAO = new PagamentoDAO();
        $pagamentoDAO->incluirPagamento($this);
    }

    public function excluirPagamento(){
        $pagamentoDAO = new PagamentoDAO();
        $pagamentoDAO->excluirPagamento($this);
    }

    public function alterarPagamento(){
        $pagamentoDAO = new PagamentoDAO();
        $pagamentoDAO->alterarPagamento($this);
    }

    public function pesquisarPagamento(){
        $pagamentoDAO = new PagamentoDAO();
        $pagamentoDAO->pesquisarPagamento($this);
    }

    public function listarTudo(){
        $pagamentoDAO = new PagamentoDAO();
        return $pagamentoDAO->listarTudo();
    }
}

?>
