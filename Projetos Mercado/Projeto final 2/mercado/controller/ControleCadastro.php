<?php
    require_once "model/Cliente.php";
    require_once "model/ClienteDAO.php";
    require_once "model/UsuarioDAO.php";
    class ControleCadastro
    {
        /**
         * Faz diferentes processamentos do cadastro do usuário conforme a $opcao selecionada.
         * "cadastroCliente" - Coordena a inserção de um novo cadastro de usuário/cliente
         * "perfilCliente" - Caso esteja logado, ele solicita os dados do Cliente da base de dados
         * "alterarDados" - Altera os dados do cliente (nome, email, cpf, telefone)
         * "alterarEndereco" - Altera os dados de endereco do cliente (cep, endereco, numero, complemento)
         * "alterarSenha" - Altera a senha do usuario.
         */ 
        public static function processa($opcao)
        {
            $clienteDAO = new ClienteDAO();
            $cliente = new Cliente();

            switch($opcao){
                case "cadastroCliente":
                    // echo "CadastroCliente";
                    $cliente->setNome($_POST["nome"]);
                    $cliente->setSenha($_POST["senha"]);
                    $cliente->setEmail($_POST["email"]);
                    $cliente->setCPF($_POST["cpf"]);
                    $cliente->setTelefone($_POST["telefone"]);
                    $cliente->setCep($_POST["cep"]);
                    $cliente->setEndereco($_POST["endereco"]);
                    $cliente->setNumero($_POST["numero"]);
                    $cliente->setComplemento($_POST["complemento"]);

                    $cliente->setIDUsuario($cliente->cadastrarUsuario());

                    if($cliente->getIDUsuario() != 0){
                        $cliente->setId("cliente", $clienteDAO->cadastrarCliente($cliente));
                        require "View/login.php";
                    }
                    else{
                        echo "Não foi possível cadastrar o usuário";
                    }
                    break;

                case "perfilCliente":

                    if(isset($_SESSION["idusuario"]))
                    {
                        $cliente->setIDUsuario($_SESSION["idusuario"]);
                        $clienteDAO->getDados($cliente);
                        require "View/perfil.php";
                    }
                    
                    break;
                case "alterarDados":
                    $cliente->setIDCliente($_POST["idcliente"]);
                    $cliente->setIDUsuario($_SESSION["idusuario"]);
                    $cliente->setNome($_POST["nome"]);
                    $cliente->setEmail($_POST["email"]);
                    $cliente->setCPF($_POST["cpf"]);
                    $cliente->setTelefone($_POST["telefone"]);

                    $clienteDAO->alteraDados($cliente);

                    ?>
                        <script type="text/javascript">
                            window.location.href = 'perfil';
                        </script>
                    <?php
                    break;
                case "alterarEndereco":
                    $cliente->setIdcliente($_POST["idcliente"]);
                    $cliente->setCep($_POST["cep"]);
                    $cliente->setEndereco($_POST["endereco"]);
                    $cliente->setNumero($_POST["numero"]);
                    $cliente->setComplemento($_POST["complemento"]);
                    
                    $clienteDAO->alteraEndereco($cliente);
                    ?>
                        <script type="text/javascript">
                            window.location.href = 'perfil';
                        </script>
                    <?php
                    break;
                
                case "alterarSenha":
                    echo "Altera Senha";
                    $idusuario = $_SESSION["idusuario"];
                    $senhaAtual = $_POST["senhaAtual"];
                    $novaSenha = $_POST["novaSenha"];

                    if($clienteDAO->consultaSenha($idusuario, $senhaAtual)){
                        $clienteDAO->alteraSenha($idusuario, $novaSenha);
                        ?>
                            <script type="text/javascript">
                                window.location.href = 'perfilsenhaalterada';
                            </script>
                        <?php
                    }else{
                        ?>
                            <script type="text/javascript">
                                window.location.href = 'perfilsenhanaoalterada';
                            </script>
                        <?php
                    }

                    break;

                case "excluirconta":
                    $idusuario = $_SESSION["idusuario"];

                    $clienteDAO->excluiConta($idusuario);

                    ?>
                        <script type="text/javascript">
                            window.location.href = 'desloga';
                        </script>
                    <?php
                    break;
                default:
                    break;
            }
        }
    }
?>