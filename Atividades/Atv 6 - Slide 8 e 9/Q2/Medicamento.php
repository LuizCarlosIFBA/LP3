<?php
   
    Class Medicamento{
         //put your code here
    private $nomeFantasia,$preco,$principioAtivo;
    
    public function getNomeFantasia() {
        return $this->nomeFantasia;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getPrincipioAtivo() {
        return $this->principioAtivo;
    }

    public function setNomeFantasia($nomeFantasia): void {
        $this->nomeFantasia = $nomeFantasia;
    }

    public function setPreco($preco): void {
        $this->preco = $preco;
    }

    public function setPrincipioAtivo($principioAtivo): void {
        $this->principioAtivo = $principioAtivo;
    }

    public function __construct($nomeFantasia, $preco, $principioAtivo) {
        $this->nomeFantasia = $nomeFantasia;
        $this->preco = $preco;
        $this->principioAtivo = $principioAtivo;
    }

    
    public function substituirMedicamento($nomeFantasia, $preco,$principioAtivo): void {
        if($this->principioAtivo==$principioAtivo){
            $this->nomeFantasia = $nomeFantasia;
            $this->preco = $preco;
            echo "Substituido";
        }else echo "Não pode ser substituido, pois o principio ativo é diferente";
    }
}
?>