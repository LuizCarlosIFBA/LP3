<?php
require("receitaMedica.php");
require("Medicamento.php");

$lista = array();

$receita = new receitaMedica("Luiz Sacramento");

$medicamento1 = new Medicamento("quimicoSA",10,"Paracetamol");
$medicamento2 = new Medicamento("MedicoME",5,"Paracetamol");
$lista = array($medicamento1,$medicamento2);
$receita->adicionarMedicamento($lista);


$max = count($lista);
echo "\nValor da receita: R$".$receita->calcularReceita($max);
echo "\nValor da receita com escolhas mais baratas: 
 R$".$receita->calcularReceitaMaisBarata($max);




