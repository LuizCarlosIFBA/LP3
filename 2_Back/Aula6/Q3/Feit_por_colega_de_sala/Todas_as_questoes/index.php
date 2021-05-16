<?php
  require_once('models/checking-account.model.php');
  require_once('models/medicine.model.php');
  require_once('models/prescription.model.php');

  $callables = [];

  $callables["First"] = function(): void {
    $account = new CheckingAccount("3334-3", 43.54, true, 100);

    $account->deposit(100);
    $account->withdraw(50);
    echo $account->getBalance();
  };

  $callables["Second"] = function(): void {
    $med1 = new Medicine("med1", 30, "picles");
    $med2 = new Medicine("med1", 30, "coxinha");
    $med3 = new Medicine("med1", 30, "trigo");
    $med4 = new Medicine("med1", 30, "picles");

    echo $med1->canBeChangedBy($med4) ? "Yes, it can!" : "No, please, stop";
    echo $med1->canBeChangedBy($med3) ? "Yes, it can!" : "No, please, stop";
  };

  $callables["Third"] = function(): void {
    $pres = new Prescription("Tiago");
    $med1 = new Medicine("med1", 30, "picles");
    $med2 = new Medicine("med1", 30, "coxinha");
    $med3 = new Medicine("med1", 30, "trigo");
    $med4 = new Medicine("med1", 15, "picles");

    $pres->pushMedicine($med1);
    $pres->pushMedicine($med2);
    $pres->pushMedicine($med3);
    $pres->pushMedicine($med4);

    echo "Total: " . $pres->getTotal() . "\n";
    echo "Cheapest Total: " . $pres->getCheapestTotal() . "\n";
  };

  function caller(array $callables) {

    foreach($callables as $key => $func) {
      echo "$key Test: \n";
      $func();
      echo "\n";
    }
  }
  
  caller($callables);
?>