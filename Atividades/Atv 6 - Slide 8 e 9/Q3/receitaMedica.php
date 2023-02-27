<?php
class receitaMedica {
    private $nomePaciente;
    private $listaMedicamentos=array();

    public function getListaMedicamentos() {
        return $this->listaMedicamentos;
    }
    
    public function getNomePaciente() {
        return $this->nomePaciente;
    }

    public function setNomePaciente($nomePaciente): void {
        $this->nomePaciente = $nomePaciente;
    }

    public function setListaMedicamentos($listaMedicamentos): void    {
        $this->listaMedicamentos = $listaMedicamentos;
    }  
  
    public function __construct($nomePaciente) {
        $this->nomePaciente = $nomePaciente;
    }

    public function adicionarMedicamento($lista){
        $this->listaMedicamentos=$lista;
    }

    /*A regra é: os genéricos, ou seja, mais baratos são 20% */
    /*mais caros */
    public function calcularReceita($max){
        $valor=0;
        for($i=0; $i<$max; $i++)
          $valor+=$this->listaMedicamentos[$i]->getPreco();
        return $valor;
    }

    public function calcularReceitaMaisBarata($max){
        $valor=0;
        for($i=0; $i<$max; $i++)
          $valor+=$this->listaMedicamentos[$i]->getPreco();
        return $valor*0.8;
    }

  
}
