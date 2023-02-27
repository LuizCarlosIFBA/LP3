<?php

class ClientePF extends Cliente{
    private $cpf;
    
    public function getCpf() {
        return $this->cpf;
    }
    
    public function setCpf($cpf): void {
        $this->cpf = $cpf;
    }

    public function __construct($numeroContrato, $endereco, $consumo,$cpf) {
      parent::__construct($numeroContrato, $endereco, $consumo);
      $this->nome = $cpf;
    }

    public function calcularConsumo(){
      $valor = 40;
      $consumo_energia = parent::getConsumo();
      if($consumo_energia>100){
        $valor = $consumo_energia*0.8;
      }
      return $valor;
    }
}