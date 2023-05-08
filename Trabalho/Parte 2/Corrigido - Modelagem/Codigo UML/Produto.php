<?php

class Produto {
    private string $codReferencia;
    private double $preco;
    private string $descricao;
    private string $categoria;
    
    
    public function __construct(string $codReferencia, double $preco, string $descricao, string $categoria) {
        $this->codReferencia = $codReferencia;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
    }
    
    public function getCodReferencia(): string {
        return $this->codReferencia;
    }

    public function getPreco(): double {
        return $this->preco;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function getCategoria(): string {
        return $this->categoria;
    }

    public function setCodReferencia(string $codReferencia): void {
        $this->codReferencia = $codReferencia;
    }

    public function setPreco(double $preco): void {
        $this->preco = $preco;
    }

    public function setDescricao(string $descricao): void {
        $this->descricao = $descricao;
    }

    public function setCategoria(string $categoria): void {
        $this->categoria = $categoria;
    }


}
