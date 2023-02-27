<?php
  class Cliente{
    //put your code here
    private $numeroContrato, $endereco, $consumo;
    
    public function getNumeroContrato() {
        return $this->numeroContrato;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getConsumo() {
        return $this->consumo;
    }

    public function setNumeroContrato($numeroContrato): void {
        $this->numeroContrato = $numeroContrato;
    }

    public function setEndereco($endereco): void {
        $this->endereco = $endereco;
    }

    public function setConsumo($consumo): void {
        $this->consumo = $consumo;
    }

    public function __construct($numeroContrato, $endereco, $consumo) {
        $this->numeroContrato = $numeroContrato;
        $this->endereco = $endereco;
        $this->consumo = $consumo;
    }

    public function calcularConsumo(){
      return 0;
    }
}
?>