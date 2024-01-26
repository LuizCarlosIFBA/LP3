<?php
class UsuarioSessao
{
    public function logout()
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time() + (86400 * 1));
                setcookie($name, '', time() + (86400 * 1), '/');
            }
        }

        if (isset($_SESSION))
        {
            unset($_SESSION["idusuario"]);
            unset($_SESSION["idcliente"]);
            unset($_SESSION["nomeusuario"]);
            unset($_SESSION["email"]);
            unset($_SESSION["idfuncionario"]);
            unset($_SESSION["idcargo"]);
        }

        header("Refresh:0; url=index.php");
    }

    public function startSession()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        
        $this->loadCookie();
    }

    public function loadCookie()
    {
        if (count($_COOKIE) > 0) {
            if (isset($_COOKIE["idusuario"]) && isset($_COOKIE["nomeusuario"])) {
                $_SESSION["idusuario"] = $_COOKIE["idusuario"];
                if (isset($_COOKIE["idcliente"])) {
                    $_SESSION["idcliente"] = $_COOKIE["idcliente"];
                }
                $_SESSION["nomeusuario"] = $_COOKIE["nomeusuario"];
                $_SESSION["email"] = $_COOKIE["email"];

                if (isset($_COOKIE["idfuncionario"])) {
                    $_SESSION["idfuncionario"] = $_COOKIE['idfuncionario'];
                    $_SESSION["idcargo"] = $_COOKIE['idcargo'];
                }
            }
        }
    }

}
?>