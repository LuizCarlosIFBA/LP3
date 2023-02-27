<?php
   
    Class Conta{
        private $numero, $saldo, $status, $limite;
        
        
        public function getLimite() {
            return $this->limite;
        }

        public function setLimite($limite): void {
            $this->limite = $limite;
        }
        /**
         * Get the value of numero
         */ 
        public function getNumero()
        {
                return $this->numero;
        }

        /**
         * Set the value of numero
         *
         * @return  self
         */ 
        public function setNumero($numero)
        {
                $this->numero = $numero;

                return $this;
        }

        /**
         * Get the value of saldo
         */ 
        public function getSaldo()
        {
                return $this->saldo;
        }

        /**
         * Set the value of saldo
         *
         * @return  self
         */ 
        public function setSaldo($saldo)
        {
                $this->saldo = $saldo;

                return $this;
        }

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
                return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
                $this->status = $status;

                return $this;
        }


        public function __construct($numero, $saldo, $status, $limite)
        {
            
            $this->numero = $numero;
            $this->saldo = $saldo;
            $this->status = $status;
            $this->limite = $limite;
            echo "*** Conta criada com sucesso ***";
        }

        public function depositar($dinheiro)
        {
                $this->saldo+=$dinheiro;
                echo "\n\n-- Deposito ---";
                echo "\nDeposito de R$ ".$dinheiro." realizado com sucesso";
        }

        public function efetuarSaque($saque)
        {       if($saque<=$this->limite){
                  $this->saldo-=$saque;
                  echo "\n\n-- Saque ---";
                  echo "\nSaque de R$ ".$saque." realizado com sucesso";
                }else echo "\n\nSaque não poderá ser efetuado porque ultrapassou o limite";
        }

        public function emitirSalado()
        {       echo "\n\n ---  Saldo ---- ";
                echo "\nNúmero: ". $this->getNumero();
                echo "\nSaldo:  ". $this->getSaldo();
                echo "\nLimite: ". $this->getLimite();
                echo "\nStatus: ". $this->getStatus();
        }
    }
?>