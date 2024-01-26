<?php
require_once "Model/DAO/PedidoSituacaoDAO.php";
require_once "Pedido.php";
require_once "Situacao.php";
class PedidoSituacao{
    private $pedido;
    private $situacao;
    private $data_atualizacao;
    
    
    public function setPedido($pedido){
        $this->pedido = $pedido;
    }
    public function setSituacao($situacao){
        $this->situacao = $situacao;
    }
    public function setDataAtualizacao ($data){
        $this->data_atualizacao = $data;
    }

    public function getPedido(){
        return $this->pedido;
    }
    public function getSituacao(){
        return $this->situacao;
    }
    public function getDataAtualizacao (){
        return $this->data_atualizacao;
    }


    public function incluirEntrada(){
        $pedidoSituacaoDAO = new PedidoSituacaoDAO();
        $pedidoSituacaoDAO->incluirEntrada($this);
    }

    public function excluirEntrada(){
        $pedidoSituacaoDAO = new PedidoSituacaoDAO();
        $pedidoSituacaoDAO->excluirEntrada($this);
    }

    /* Neste caso, vale mais a pena excluir e inserir

    public function alterarEntrada(){
        $pedidoSituacaoDAO = new PedidoSituacaoDAO();
        $pedidoSituacaoDAO->alterarEntrada($this);
    }
    */

    public function pesquisarPedido(){
        $pedidoSituacaoDAO = new PedidoSituacaoDAO();
        $pedidoSituacaoDAO->pesquisarPedido($this);
    }

    public function pesquisarSituacao(){
        $pedidoSituacaoDAO = new PedidoSituacaoDAO();
        $pedidoSituacaoDAO->pesquisarSituacao($this);
    }

    public function listarTudo(){
        $pedidoSituacaoDAO = new PedidoSituacaoDAO();
        return $pedidoSituacaoDAO->listarTudo();
    }
}

?>