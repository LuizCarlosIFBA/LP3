<?php
require_once "Model/Livro.php";
require_once "IControlador.php";
class ControladorFormLivro implements IControlador{
    
    public function processaRequisicao(){
        require "View/CadLivro.php";
    }
}
    
    
?>