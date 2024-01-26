<?php
require_once "Model/DAO/ProdutoDAO.php";
require_once "Categoria.php";
class Produto{
    private $idproduto;
    private $nome;
    private $marca;
    private $preco;
    private $estoque;
    private $nome_imagem;
    private $categoria;

    
    public function setIdProduto ($id){
        $this->idproduto = $id;
    }
    public function setNome ($nome){
        $this->nome = $nome;
    }
    public function setMarca ($marca){
        $this->marca = $marca;
    }
    public function setPreco ($preco){
        $this->preco = $preco;
    }
    public function setEstoque ($estoque){
        $this->estoque = $estoque;
    }
    public function setNomeImagem ($nome){
        $this->nome_imagem = $nome;
    }
    public function setCategoria ($categoria){
        $this->categoria = $categoria;
    }
    
    public function getIdProduto (){
        return $this->idproduto;
    }
    public function getNome (){
        return $this->nome;
    }
    public function getMarca (){
        return $this->marca;
    }
    public function getPreco (){
        return $this->preco;
    }
    public function getEstoque (){
        return $this->estoque;
    }
    public function getNomeImagem (){
        return $this->nome_imagem;
    }
    public function getCategoria (){
        return $this->categoria;
    }


    public function incluirProduto(){
        $produtoDAO = new ProdutoDAO();
        $produtoDAO->incluirProduto($this);
    }

    public function excluirProduto(){
        $produtoDAO = new ProdutoDAO();
        $produtoDAO->excluirProduto($this);
    }

    public function alterarProduto(){
        $produtoDAO = new ProdutoDAO();
        $produtoDAO->alterarProduto($this);
    }

    public function pesquisarProduto(){
        $produtoDAO = new ProdutoDAO();
        $produtoDAO->pesquisarProduto($this);
    }

    public function pesquisarProdutoNome(){
        $produtoDAO = new ProdutoDAO();
        return $produtoDAO->pesquisarProdutoNome($this);
    }

    public function pesquisarRelacionados(){
        $produtoDAO = new ProdutoDAO();
        return $produtoDAO->pesquisarRelacionados($this);
    }

    public function listarTudo(){
        $produtoDAO = new ProdutoDAO();
        return $produtoDAO->listarTudo();
    }
}

?>
