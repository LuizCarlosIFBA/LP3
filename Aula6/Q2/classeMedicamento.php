<?php 
    class contaCorrente(){
        private $nomeFantasia;
        private $preco;
        private $principioAtivo;
        
        public function setNomeFantasia($nomeFantasia){
            $this->nomeFantasia = $nomeFantasia;
        }
         
        public function setPreco($preco){
            $this->preco = $preco;
        }

        public function setPrincipioAtivo($principioAtivo){
            $this->principioAtivo = $principioAtivo;
        }

        public function getNomeFantasia($nomeFantasia){
           return $nomeFantasia;
        }

        public function getPreco($preco){
            return $preco;
        }

        public function getPrincipioAtivo($principioAtivo){
            return $principioAtivo;
        }

        public function_construct($nomeFantasia,$preco,$principioAtivo){
            $this->nomeFantasia = $nomeFantasia;
            $this->preco = $preco;
            $this->principioAtivo = $principioAtivo;         
        }

        public function substituir($nomeFantasia,$preco,$principioAtivo){
            if($principioAtivo==getPrincipioAtivo){
                $this->nomeFantasia = $nomeFantasia;
                $this->preco = $preco;
                $this->principioAtivo = $principioAtivo;
            }else echo "Não pode ser substituido, pois os principios ativos são diferentes";
        }

        
    } 