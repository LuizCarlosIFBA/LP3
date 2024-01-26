<?php
require_once "model/Banco.php";
class FuncionarioDAO
{
    public static function getFuncionarioInfo($funcionario)
    {
        $conn = Banco::conectarBanco();
        $sql = $conn->prepare
        ("SELECT f.idfuncionario as idfuncionario, c.idcargo, c.descricao as cargo
        FROM mercado.usuario as u
        JOIN funcionario as f ON u.funcionario_idfuncionario = f.idfuncionario
        JOIN cargo as c ON f.cargo_idcargo = c.idcargo
        WHERE u.idusuario=:idusuario");

        $sql->bindParam("idusuario", $idusuario);

        $idusuario = $funcionario->getIDUsuario();
        
        $sql->execute();
        $data=$sql->fetch(PDO::FETCH_ASSOC);       

        $funcionario->setCargo($data["cargo"]);
        $funcionario->setIDCargo($data["idcargo"]);
        $funcionario->setIDFuncionario($data["idfuncionario"]);

        return $funcionario;
    }
}
?>


