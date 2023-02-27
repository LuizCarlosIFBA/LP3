<?php
/**
 * Description of Compania
 *
 * @author luiz
 */
class Companhia {
    //put your code here
    private $nome, $cnpj;
    private $listaClientes = array();
    
    public function getNome() {
        return $this->nome;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function getListaClientes() {
        return $this->listaClientes;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setCnpj($cnpj): void {
        $this->cnpj = $cnpj;
    }

    public function setListaClientes($listaClientes): void {
        $this->lista = $listaClientes;
    }

    public function __construct($nome, $cnpj, $listaClientes) {
        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->lista = $listaClientes;
    }

    
}

?>