<?php
require_once "model/usuario.php";
class Funcionario extends Usuario
{
    #atributos
    private $cargo;
    private $idcargo;
    private $idfuncionario;

    function __construct() #construct
    {
    }

    #métodos
    public function getCargo() {return $this->cargo;}
    public function setCargo($cargo) {$this->cargo = $cargo;}

    public function getIDCargo() {return $this->idcargo;}
    public function setIDCargo($idcargo) {$this->idcargo = $idcargo;}

    public function getIDFuncionario() {return $this->idfuncionario;}
    public function setIDFuncionario($idfuncionario) {$this->idfuncionario = $idfuncionario;}
}
?>


