<?php
require "ClasseMedicamento.php";
class Receita{
    private $nomePaciente;
    private $remedios;

    function __construct($nome){
        $this->nomePaciente = $nome;
        $this->remedios=array();
    }
    public function getNomePaciente(){
        return $this->nomePaciente;
    }

    public function addRemedio($medicamento){
        /*for ($cont = 0; $cont < count($this->remedios); $cont++)
          if ($this->remedios[cont]==null){
          $this->remedios[cont] = $medicamento;
          break;
        }*/
        //$this->remedios[count($this->remedios)] = $medicamento;
        array_push($this->remedios,$medicamento);

    }

    public function totalReceita(){
        $total = 0;
        for ($cont = 0; $cont < count($this->remedios); $cont++)
           $total+=$this->remedios[$cont]->precoVenda();
        return $total;
    }
}
?>