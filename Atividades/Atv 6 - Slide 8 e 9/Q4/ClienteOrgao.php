<?php

class ClienteOrgao extends Cliente{
  private $tipo, $nome;
    
  public function getTipo() {
    return $this->tipo;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setTipo($tipo): void {
    $this->tipo = $tipo;
  }

  public function setNome($nome): void {
    $this->nome = $nome;
  }

  public function __construct($numeroContrato, $endereco, $consumo,$nome,$tipo) {
    parent::__construct($numeroContrato, $endereco, $consumo);
    $this->tipo = $tipo;
    $this->nome = $nome;
  }

  public function calcularConsumo(){
      return 100;
  }
}

?>