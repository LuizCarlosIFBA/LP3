<?php
require_once "Model/DAO/CartaoDAO.php";
require_once "Usuario.php";
class Cartao{
    private $idcartao;
    private $nome_proprietario;
    private $numero_cartao;
    private $bandeira;
    private $mes_validade;
    private $ano_validade;
    private $cvv;
    private $cpf;
    private $usuario;


    public function setIdCartao ($id){
        $this->idcartao = $id;   
    }
    public function setNomeProprietario ($nome){
        $this->nome_proprietario = $nome;
    }
    public function setNumeroCartao ($numero){
        $this->numero_cartao = $numero;
    }
    public function setBandeira ($bandeira){
        $this->bandeira = $bandeira;
    }
    public function setMesValidade ($mes){
        $this->mes_validade = $mes;
    }
    public function setAnoValidade ($ano){
        $this->ano_validade = $ano;
    }
    public function setCvv ($cvv){
        $this->cvv = $cvv;
    }
    public function setCpf ($cpf){
        $this->cpf = $cpf;
    }
    public function setUsuario ($usuario){
        $this->usuario = $usuario;   
    }
    
    public function getIdCartao (){
        return $this->idcartao;   
    }
    public function getNomeProprietario (){
        return $this->nome_proprietario;
    }
    public function getNumeroCartao (){
        return $this->numero_cartao;
    }
    public function getBandeira (){
        return $this->bandeira;
    }
    public function getMesValidade (){
        return $this->mes_validade;
    }
    public function getAnoValidade (){
        return $this->ano_validade;
    }
    public function getCvv (){
        return $this->cvv;
    }
    public function getCpf (){
        return $this->cpf;
    }
    public function getUsuario (){
        return $this->usuario;   
    }


    public function incluirCartao(){
        $cartaoDAO = new CartaoDAO();
        $cartaoDAO->incluirCartao($this);
    }

    public function excluirCartao(){
        $cartaoDAO = new CartaoDAO();
        $cartaoDAO->excluirCartao($this);
    }

    public function alterarCartao(){
        $cartaoDAO = new CartaoDAO();
        $cartaoDAO->alterarCartao($this);
    }

    public function pesquisarCartao(){
        $cartaoDAO = new CartaoDAO();
        $cartaoDAO->pesquisarCartao($this);
    }

    public function listarTudo(){
        $cartaoDAO = new CartaoDAO();
        return $cartaoDAO->listarTudo();
    }
}

?>
