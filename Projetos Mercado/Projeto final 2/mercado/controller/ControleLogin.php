<?php
    require_once "model/Usuario.php";

    class ControleLogin
    {
        public static function login($opcao)
        {
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $data = Usuario::getUsuarioInfo($email, $senha);

            if(Usuario::verificaUsuario($email, $senha) == 1 and $data['ativo'] == 1)
            {

                if($data['funcionario_idfuncionario'] != null){
                    $data2 = Usuario::getCargoFuncionario($data['funcionario_idfuncionario']);
                }
                
                
                if(isset($_POST["lembrarsenha"]) && $_POST["lembrarsenha"] == 1)
                {
                    setcookie("nomeusuario", $data['nomeusuario'], time() + (86400 * 1), "/");
                    setcookie("email", $email, time() + (86400 * 1), "/");
                    setcookie("idusuario", $data['idusuario'], time() + (86400 * 1), "/");
                    setcookie("idcliente", $data['cliente_idcliente'], time() + (86400 * 1), "/");

                    if($data['funcionario_idfuncionario'] !=null){
                        setcookie("idfuncionario", $data['funcionario_idfuncionario'], time() + (86400 * 1), "/");
                        setcookie("idcargo", $data2['idcargo'], time() + (86400 * 1), "/");
                    }
                }
                
                $_SESSION["idusuario"] = $data['idusuario'];
                $_SESSION["idcliente"] = $data['cliente_idcliente'];
                $_SESSION["idfuncionario"] = $data['funcionario_idfuncionario'];
                $_SESSION["email"] = $email;
                $_SESSION["nomeusuario"] = $data['nomeusuario'];

                if($data['funcionario_idfuncionario'] !=null){
                    $_SESSION["idcargo"] = $data2['idcargo'];
                }
            }
            header("Refresh:0; url=index.php");
        }
    }
?>