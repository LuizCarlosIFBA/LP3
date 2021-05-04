

<?php
    require("classeContaCorrente")

    $c1 = new ContaCorrente()
    $c1 = saque(10)
    $c1 = deposito(200)
    echo "saldo = ".c1->$saldo();
    
?>