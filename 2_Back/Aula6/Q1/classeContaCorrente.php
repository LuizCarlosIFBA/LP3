<?php 
    class contaCorrente(){
        private $numero;
        private $saldo;
        private $status;
        private $limite;

        public function_construct($numero,$saldo,$status,$limite){
            $this->numero = $numero;
            $this->saldo = 0;
            $this->status = "comum";
            $this->limite = 0;
        }

        public function deposito($valor){
            $this->saldo += $valor;
        }

        public function saque($valor){
            if($this->saldo >= $valor){
                $this->saldo -= $valor;
            }else echo "Saldo insuficiente"    
        }

        public function getSaldo($valor){
            $this->saldo += $valor;
        }
    } 