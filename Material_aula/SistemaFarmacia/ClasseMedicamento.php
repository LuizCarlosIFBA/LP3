<?php
require 'ClasseLatoratorio.php';
class Medicamento{
  private $nomeFantasia;
  private $precoCusto;
  private $principioAtivo;
  private $laboratorio;
  
  function __construct($nome,$preco,$principio, $lab){
    $this->nomeFantasia = $nome;
    $this->precoCusto = $preco;
    $this->principioAtivo = $principio;
    $this->laboratorio = $lab;
  }

  public function imprimir(){
    echo "Nome do medicamento:",$this->nomeFantasia,"<br>";
    echo "Preco de custo: R$",$this->precoCusto,"<br>";
    echo "Principio ativo: ",$this->principioAtivo,"<br>";
    echo "Preco de venda:",$this->precoVenda(),"<br>";
  }
  
  public function precoVenda(){
    return $this->precoCusto*$this->laboratorio->getPercLucro();
  }
}
?>