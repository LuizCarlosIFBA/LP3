<?php 
    class receitaMedica(){
        private $nomePaciente;
        private $listaMedicamentos[50];

        public function_construct($nomePaciente){
            $this->nomePaciente = $nomePaciente;
        }

        public function setMedicamentos($posi,$nome){
            $this->listaMedicamentos[posi] = $nome;
        }

        public function calcReceita($qtd){
            return " O valor do remedio é: ".100*$qtd;
        }
        
        //Remédio mais barato 
        //50% de desconto
        public function calcReceita($qtd,$per){
            return " O valor do remedio é: ".(100*$qtd)*per;
        }        
          
    } 
