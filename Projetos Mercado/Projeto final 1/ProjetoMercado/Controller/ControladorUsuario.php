<?php
require_once "IControlador.php";
require_once "Model/BO/Usuario.php";
class ControladorUsuario implements IControlador{
    
    public function processaRequisicao($acao){
        if ($acao=="C") {
            $usuario = new Usuario();
            $usuario->setNome($_POST["nome"]);
            $usuario->setCpf($_POST["cpf"]);
            $usuario->setTelefone($_POST["telefone"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setSenha($_POST["senha"]);
            $usuario->setPermissao($_POST["permissao"]);
            $usuario->setEndereco($_POST["endereco"]);
            $usuario->setNumero($_POST["numero"]);
            $usuario->setCep($_POST["cep"]);
            $bairro = new Bairro;
            $usuario->setBairro($bairro);
            $usuario->getBairro()->setIdBairro($_POST["idbairro"]);

            $usuario->incluirUsuario();

            $_SESSION["usuario"] = serializeCorreto($usuario);

            #cadastro pelo carrinho
            if(isset($_SESSION["identificar"])) {
                unset($_SESSION["identificar"]);
                header("Location: Pagamento");
            }
            #cadastro comum
            else {
                header("Location: Home");
            }

            exit();
        }
        else if ($acao=="L") {
            $usuario = new Usuario();
            $usuario->setEmail($_POST["email"]);
            $usuario->setSenha($_POST["senha"]);

            $resposta = $usuario->verificarLogin();

            if ($resposta) {
                $_SESSION["usuario"] = serializeCorreto($usuario);

                #login pelo carrinho
                if(isset($_SESSION["identificar"])) {
                    unset($_SESSION["identificar"]);
                    header("Location: Pagamento");
                }
                #login comum
                else {
                    header("Location: Home");
                }
                
                exit();
            }
            else {
                $_SESSION["invalido"] = true;
                header("Location: Login");
                exit();
            }
        }
        else if ($acao=="AE") {
            $usuario = new Usuario();
            $usuario->setIdUsuario($_POST["idusuario"]);
            $usuario->setEndereco($_POST["endereco"]);
            $usuario->setNumero($_POST["numero"]);
            $usuario->setCep($_POST["cep"]);
            $bairro = new Bairro;
            $usuario->setBairro($bairro);
            $usuario->getBairro()->setIdBairro($_POST["idbairro"]);

            $usuario->alterarEndereco();

            $_SESSION["usuario"] = serializeCorreto($usuario);

            header("Location: Confirmacao");
            exit();
        }       
    }

}   
?>