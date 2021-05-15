<?php
    abstract class produto{
        private $codigo;
        private $nome;
        private $precoCusto;

        public function _construct($codigo, $nome, $precoCusto){
           $this->codigo = $codigo;
           $this->nome = $nome;
           $this->precoCusto = $precoCusto;
        }

        public abstract function precoVenda();

        public function getPrecoCusto(){
            return $this->precoCusto;
        }
       
    }

    class ProdutoPerecivel extends Produto{
        private $validade;
        public function _construct($codigo, $nome, $precoCusto);
         parent::_construct($codigo, $nome, $precoCusto)){
            $this->validade = $validade;
        }


        public function precoVenda(){
            return parent::getPrecoCusto()*1.5;
        }

    }
    
    class ProdutoNaoPerecivel extends Produto{
        private $subtancia;
        public function _construct($codigo, $nome, $precoCusto);
         parent::_construct($codigo, $nome, $precoCusto)){
            $this->subtancia = $subtancia;
        }
        public function precoVenda(){
            return parent::getPrecoCusto()*1.3;
        }
    }

$p1 = new Produto("Sabao",4,"xxxx");   
?>
