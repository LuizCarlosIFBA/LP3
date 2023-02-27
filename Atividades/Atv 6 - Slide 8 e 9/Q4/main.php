<?php
  require("Companhia.php");
  require("Cliente.php");
  require("ClientePF.php");
  require("ClientePJ.php");
  require("ClienteOrgao.php");

  $orgao = new ClienteOrgao(12345,"Rua A - CEP: 0000 Salvador -BA",1000,"prefeitura","Municipal");
  $pf = new ClientePF(12346,"Rua A - CEP: 0000 Salvador -BA",150,"12345678900");
  $pj = new ClientePJ(12347,"Rua B - CEP: 0000 Salvador -BA",200,"12345678901");

echo "Orgão público: R$ ".$orgao->calcularConsumo();
echo "\nCliente PF: R$ ".$pf->calcularConsumo();
echo "\nCliente PJ: R$ ".$pj->calcularConsumo();

