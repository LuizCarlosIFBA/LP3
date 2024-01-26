<?php
class Processamentopedido
{
    #atributos
    private $idpedido;
    private $idstatus;
    private $status;
    private $dataStatus;
    private $dataSaida;
    private $etapaFinalizada;
    private $idfuncionario;
    
    function __construct() #construct
    {
        
    }

    public function getIDStatus() {return $this->idstatus;}
    public function setIDStatus($idstatus) {$this->idstatus = $idstatus;}

    public function getStatus() {return $this->status;}
    public function setStatus($status) {$this->status = $status;}

    public function getDataStatus() {return $this->dataStatus;}
    public function setDataStatus($dataStatus) {$this->dataStatus = $dataStatus;}

    public function getDataSaida() {return $this->dataSaida;}
    public function setDataSaida($dataSaida) {$this->dataSaida = $dataSaida;}

    public function getEtapaFinalizada() {return $this->etapaFinalizada;}
    public function setEtapaFinalizada($etapaFinalizada) {$this->etapaFinalizada = $etapaFinalizada;}

    public function getIdfuncionario() {return $this->idfuncionario;}
    public function setIdfuncionario($idfuncionario) {$this->idfuncionario = $idfuncionario;}

    public function getIdpedido() {return $this->idpedido;}
    public function setIdpedido($idpedido) {$this->idpedido = $idpedido;}
}
?>
