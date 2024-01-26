<?php
require_once "model/ProdutoDAO.php";
class Produto
{
    #atributos
    private $idproduto;
    private $nome;
    private $imagem;
    private $valor;
    private $desconto;
    private $descricao;
    private $categoria;
    private $tipo;
    private $embalagem;
    private $peso;
    private $marca;

    function __construct() #construct
    {
    }

    public function getIDProduto() {return $this->idproduto;  }
    public function setIDProduto($idproduto) {$this->idproduto = $idproduto;}

    public function getNome() {return $this->nome;}
    public function setNome($nome) {$this->nome = $nome;}

    public function getImagem() {return $this->imagem;}
    public function setImagem($imagem) {$this->imagem = $imagem;}

    public function getValor() {return $this->valor;}
    public function setValor($valor) {$this->valor = $valor;}

    public function getDescricao() {return $this->descricao;}
    public function setDescricao($descricao) {$this->descricao = $descricao;}

    public function getCategoria() {return $this->categoria;}
    public function setCategoria($categoria) {$this->categoria = $categoria;}

    public function getEmbalagem() {return $this->embalagem;}
    public function setEmbalagem($embalagem) {$this->embalagem = $embalagem;}

    public function getTipo() {return $this->tipo;}
    public function setTipo($tipo) {$this->tipo = $tipo;}

    public function getMarca() {return $this->marca;}
    public function setMarca($marca) {$this->marca = $marca;}

    public function getPeso() {return $this->peso;}
    public function setPeso($peso) {$this->peso = $peso;}

    public function getDesconto() {return $this->desconto;}
    public function setDesconto($desconto) {$this->desconto = $desconto;}
    
    #métodos
    public function getValorDesconto()
    {
        return $this->valor - $this->valor * $this->desconto;
    }

    public function setDadosProduto()
    {
        ProdutoDAO::setDadosProduto($this->idproduto, $this);
    }
}
?>
