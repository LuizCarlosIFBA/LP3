<?php
class Categoria
{
    #atributos
    private $nome;
    private $id;
    
    function __construct() #construct
    {
    }

    #métodos
    public function metodo()
    {
        
    }

    public function getNome() {return $this->nome;}
    public function setNome($nome) {$this->nome = $nome;}
    
    public function getId() {return $this->id;}
    public function setId($id) {$this->id = $id;}
}
?>
