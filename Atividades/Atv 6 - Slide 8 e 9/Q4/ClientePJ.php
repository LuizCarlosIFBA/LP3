<?php

class ClientePJ extends Cliente{
    private $cnpj;
    
    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj): void {
        $this->cnpj = $cnpj;
    }
  
    public function __construct($numeroContrato, $endereco, $consumo,$cnpj) {
      parent::__construct($numeroContrato, $endereco, $consumo);
      $this->nome = $cnpj;
    }

    public function calcularConsumo(){
      $valor = 60;
      $consumo_energia = parent::getConsumo();
      if($consumo_energia>80){
        $valor = $consumo_energia;
      }
      return $valor;
    }
}