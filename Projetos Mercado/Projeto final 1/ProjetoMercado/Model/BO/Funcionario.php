<?php
require_once "Model/DAO/FuncionarioDAO.php";
require_once "Usuario.php";
class Funcionario extends Usuario{
    private $usuario;
    private $cargo;
    private $salario;
    private $data_contratacao;
    

    public function setUsuario ($usuario){
        $this->usuario = $usuario;
    }
    public function setCargo ($cargo){
        $this->cargo = $cargo;
    }
    public function setSalario ($salario){
        $this->salario = $salario;
    }
    public function setDataContratacao ($data){
        $this->data_contratacao = $data;
    }
    
    
    public function getUsuario (){
        return $this->usuario;
    }
    public function getCargo (){
        return $this->cargo;
    }
    public function getSalario (){
        return $this->salario;
    }
    public function getDataContratacao (){
        return $this->data_contratacao;
    }
    

    public function incluirFuncionario(){
        $funcionarioDAO = new FuncionarioDAO();
        $funcionarioDAO->incluirFuncionario($this);
    }

    public function excluirFuncionario(){
        $funcionarioDAO = new FuncionarioDAO();
        $funcionarioDAO->excluirFuncionario($this);
    }

    public function alterarFuncionario(){
        $funcionarioDAO = new FuncionarioDAO();
        $funcionarioDAO->alterarFuncionario($this);
    }

    public function pesquisarFuncionario(){
        $funcionarioDAO = new FuncionarioDAO();
        $funcionarioDAO->pesquisarFuncionario($this);
    }

    public function listarTudo(){
        $funcionarioDAO = new FuncionarioDAO();
        return $funcionarioDAO->listarTudo();
    }
}

?>
