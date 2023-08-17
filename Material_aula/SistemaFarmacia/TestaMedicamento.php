<?php


require "Receita.php";
require "ClasseMedImportado.php";
$lab1 = new Laboratorio("Roch",1.7);
$lab2 = new Laboratorio("Generico",1.2);

$med1 = new Medicamento("Tylenol",3.0,"Paracetamol",$lab1);

$med2 = new Medicamento("Novalgina",4.5,"Dipirona",$lab2);

$med1->imprimir();

$med2->imprimir();

$minhaReceita = new Receita("Ana Patricia");
$minhaReceita->addRemedio($med1);
echo $minhaReceita->getNomePaciente(), " Seu total a pagar = R$",$minhaReceita->totalReceita(),"<br>";
$minhaReceita->addRemedio($med2);
echo $minhaReceita->getNomePaciente(), " Seu total a pagar = R$",$minhaReceita->totalReceita(),"<br>";

$med3 = new MedicamentoImportado("water", 20, "H2O",$lab1,"França",2.5);
$med3->imprimir2();
?>
