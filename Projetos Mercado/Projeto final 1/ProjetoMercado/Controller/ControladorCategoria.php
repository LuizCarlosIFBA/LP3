<?php
require_once "IControlador.php";
require_once "Model/BO/Categoria.php";
class ControladorCategoria implements IControlador{
    
    public function processaRequisicao($acao){
        if ($acao=="PC") {
            if (isset($_SESSION["categoria"])) {
                $categoria = new Categoria();
                $categoria = unserialize($_SESSION["categoria"]);
                $categoria->pesquisarCategoria();
                $_SESSION["categoria"] = serializeCorreto($categoria);
                header("Location: Relacionados");
                exit();
            }
            else {
                $_SESSION["erro"] = true;#tratar----------------
                header("Location: ListaProdutos");
                exit();
            }
        }
        #if ($acao=="FC") {
            
        #}
    }
}   
?>