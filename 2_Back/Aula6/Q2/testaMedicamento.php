<?php
    require "Medicamento.php"

    $med1 = new Medicamento("Tylenol",5,"Paracetamol");
    $med2 = new Medicamento("Doril",7,"Dipirona");

    echo $med1->getNome()."R$ ".$med1->getPreco();

    echo $med1->substitui($med2)
?>
