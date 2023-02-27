        <?php
            require("Conta.php");
            
            $conta = new Conta(212122222,5000,"Cliente especial",2000);
            
            $conta->emitirSalado();
            $conta->depositar(100);
            $conta->emitirSalado();
            $conta->efetuarSaque(2001);
            $conta->emitirSalado();
        ?>
   
