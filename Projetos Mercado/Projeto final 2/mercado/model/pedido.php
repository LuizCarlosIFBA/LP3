<?php
class Pedido
{
    #atributos
    private $numeropedido;
    private $processamentopedido;
    private $cliente;
    private $valor;
    private $datacompra;
    private $dataentrega;
    private $produtoquantidade;
    private $avaliacao;
    private $comentarioavaliacao;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    
    function __construct() #construct
    {
    }

    public function getIDPedido() {return $this->numeropedido;}
    public function setIDPedido($numeropedido) {$this->numeropedido = $numeropedido;}
    
    public function getProcessamentopedido() {return $this->processamentopedido;}
    public function setProcessamentopedido($processamentopedido) {$this->processamentopedido = $processamentopedido;}
    
    public function getCliente() {return $this->cliente;}
    public function setCliente($cliente) {$this->cliente = $cliente;}

    public function getValor() {return $this->valor;}
    public function setValor($valor) {$this->valor = $valor;}
    
    public function getDatacompra() {return $this->datacompra;}
    public function setDatacompra($datacompra) {$this->datacompra = $datacompra;}
    
    public function getDataentrega() {return $this->dataentrega;}
    public function setDataentrega($dataentrega) {$this->dataentrega = $dataentrega;}
    
    public function getProdutoquantidade() {return $this->produtoquantidade;}
    public function setProdutoquantidade($produtoquantidade) {$this->produtoquantidade = $produtoquantidade;}

    public function getAvaliacao() {return $this->avaliacao;}
    public function setAvaliacao($avaliacao) {$this->avaliacao = $avaliacao;}

    public function getComentarioAvaliacao() {return $this->comentarioavaliacao;}
    public function setComentarioAvaliacao($comentarioavaliacao) {$this->comentarioavaliacao = $comentarioavaliacao;}

    public function getCep() {return $this->cep;}
    public function setCep($cep) {$this->cep = $cep;}

    public function getEndereco() {return $this->endereco;}
    public function setEndereco($endereco) {$this->endereco = $endereco;}

    public function getNumero() {return $this->numero;}
    public function setNumero($numero) {$this->numero = $numero;}

    public function getComplemento() {return $this->complemento;}
    public function setComplemento($complemento) {$this->complemento = $complemento;}

}
?>
