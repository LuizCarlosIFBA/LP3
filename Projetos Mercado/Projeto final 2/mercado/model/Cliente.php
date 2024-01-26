<?php
require_once "Usuario.php";
class Cliente extends Usuario
{
    #atributos
    private $telefone;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    private $idcliente;
    
    #private $cartao; #classe cartao caso tenha isso pra armazenar

    function __construct() #construct
    {
    }

    public function getTelefone() {return $this->telefone;}
    public function setTelefone($telefone) {$this->telefone = $telefone;}
    
    public function getCep() {return $this->cep;}
    public function setCep($cep) {$this->cep = $cep;}

    public function getEndereco() {return $this->endereco;}
    public function setEndereco($endereco) {$this->endereco = $endereco;}

    public function getNumero() {return $this->numero;}
    public function setNumero($numero) {$this->numero = $numero;}

    public function getComplemento() {return $this->complemento;}
    public function setComplemento($complemento) {$this->complemento = $complemento;}

    public function getIdcliente() {return $this->idcliente;}
    public function setIdcliente($idcliente) {$this->idcliente = $idcliente;}
}
?>


