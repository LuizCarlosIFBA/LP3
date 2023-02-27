<?php
  require("Medicamento.php");

  $medicamento = new Medicamento("quimicoSA",10,"paracetamol"); 
  $medicamento->substituirMedicamento("quimicoME",5,"paracetamol");
?>