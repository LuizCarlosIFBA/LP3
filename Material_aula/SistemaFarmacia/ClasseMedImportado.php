<?php
require_once 'ClasseMedicamento.php';
class MedicamentoImportado extends Medicamento{
   private $pais;
   private $percImposto;

   function __construct($nome,$preco,$principio, $lab,$pais,$percImp){
      parent::__construct($nome,$preco,$principio, $lab);
      $this->pais = $pais;
      $this->percImposto = $percImp;
   }
   public function imprimir2(){
    echo "Pais: ",$this->pais,"<br>";
    echo "Imposto:",$this->percImposto,"<br>";
    parent::imprimir();
   }
}
?>