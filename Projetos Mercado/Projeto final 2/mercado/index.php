<?php
require "model/UsuarioSessao.php";

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $url = strtolower($url);
} else
    $url = "index";

$session = new UsuarioSessao();

if (isset($_POST['logout']) && $_POST['logout'] == "Logout") {
    $session->logout();
}

$session->startSession();

require "view/header.php";

switch ($url) {
    #VIEW
    #USUARIO
    case "login":
        require "View/login.php";
        break;
    case "cadastro":
        require "View/cadastro.php";
        break;
    case "bebidas":
        $idcategoria = 1;
        require "View/produtoLista.php";
        break;
    case "mercearia":
        $idcategoria = 2;
        require "View/produtoLista.php";
        break;
    case "produtos-de-limpeza":
        $idcategoria = 3;
        require "View/produtoLista.php";
        break;
    case "higiene-pessoal-e-perfumaria":
        $idcategoria = 4;
        require "View/produtoLista.php";
        break;
    case "frios-e-laticínios":
        $idcategoria = 5;
        require "View/produtoLista.php";
        break;
    case "carnes-aves-e-peixes":
        $idcategoria = 6;
        require "View/produtoLista.php";
        break;
    case "congelados":
        $idcategoria = 7;
        require "View/produtoLista.php";
        break;
    case "hortifruti":
        $idcategoria = 8;
        require "View/produtoLista.php";
        break;
    
    case "comprarealizada":
        require "view/compraRealizada.php";
        break;

    #PRODUTO
    case "produto":
        require "view/produtoPagina.php";
        break;
    case "lista":
        require "View/listaproduto.php";
        break;

    #PEDIDO
    case "visualizar":
        if(isset($_SESSION["idcliente"]))
            require "View/visualizar.php";
        else
            require "view/login.php";
        break;
    case "pedido":
        if(isset($_SESSION["idcliente"]))
            require "View/pedidoPagina.php";
        else
            require "view/login.php";
        break;
    case "avaliacao":
        require "Controller/ControlePedido.php";
        ControlePedido::inserirAvaliacao();
        require "View/pedidoPagina.php";
        break;
    case "refazercompra":
        require "Controller/ControlePedido.php";
        $pedido = ControlePedido::processa($_POST["IDPedido"]);
        $listaprodutos = ControlePedido::listaProdutoquantidade($pedido);
        require "Controller/ControleCarrinho.php";
        require_once 'Model/CarrinhoSessao.php';
        $CarrinhoSessao = new CarrinhoSessao();
        $controlador = new ControleCarrinho($CarrinhoSessao);
        $controlador->AdicionaItemCarrinhoPedido($listaprodutos);
        break;

    #CONTROLLER
    case "paginafuncionario":
        if(isset($_SESSION["idfuncionario"])){
            require_once "Controller/ControleFuncionario.php";
            ControleFuncionario::mostrarPaginaFuncionario();}
        else
            require "view/login.php";
        break;

    case "pegardemanda":
        require "Controller/ControleProcessamentoPedido.php";
        ControleProcessamentoPedido::atribuirDemanda();
        break;
    
    case "finalizardemanda":
        require "Controller/ControleProcessamentoPedido.php";
        ControleProcessamentoPedido::finalizarDemanda();
        break;

    #USUARIO
    case "controlecadastro":
        require "Controller/ControleCadastro.php";
        ControleCadastro::processa("cadastroCliente");
        break;

    case "perfil":
        if(isset($_SESSION["idcliente"])){
            require "Controller/ControleCadastro.php";
            ControleCadastro::processa("perfilCliente");}
        else
            require "view/login.php";
        break;

    case "perfilsenhaalterada":
        if(isset($_SESSION["idcliente"])){
            echo "Senha alterada com sucesso!";
            require "Controller/ControleCadastro.php";
            ControleCadastro::processa("perfilCliente");}
        else
            require "view/login.php";
        break;

    case "perfilsenhanaoalterada":
        if(isset($_SESSION["idcliente"])){
            echo "Senha atual incorreta!";
            require "Controller/ControleCadastro.php";
            ControleCadastro::processa("perfilCliente");}
        else
            require "view/login.php";
        break;
    
    case "logincliente":
        require "Controller/ControleLogin.php";
        ControleLogin::login("cliente");
        break;
    
    case "alterarendereco":
        require "Controller/ControleCadastro.php";
        ControleCadastro::processa("alterarEndereco");
        break;
    
    case "alterarsenha":
        require "Controller/ControleCadastro.php";
        ControleCadastro::processa("alterarSenha");
        break;
   
    case "alterardados":
        require "Controller/ControleCadastro.php";
        ControleCadastro::processa("alterarDados");
        break;

    case "excluirconta":
        require "Controller/ControleCadastro.php";
        ControleCadastro::processa("excluirconta");
        break;

    case "desloga":
        $session->logout();
        require "view/index.php";
        break;

    #PRODUTO
    case "controleproduto":
        require "Controller/ControleProduto.php";
        break;

    #CARRINHO
    case "additemcarrinho":
        require "Controller/ControleCarrinho.php";
        require_once 'Model/CarrinhoSessao.php';
        $CarrinhoSessao = new CarrinhoSessao();
        $controlador = new ControleCarrinho($CarrinhoSessao);
        $controlador->AdicionaItemCarrinho();
        break;

    case "carrinho":
        require "Controller/ControleCarrinho.php";
        require_once 'Model/CarrinhoSessao.php';
        $CarrinhoSessao = new CarrinhoSessao();
        $controlador = new ControleCarrinho($CarrinhoSessao);
        $controlador->ListarItensCarrinho();
        break;

    case "carrinhoaltquant":
        require "Controller/ControleCarrinho.php";
        require_once 'Model/CarrinhoSessao.php';
        $CarrinhoSessao = new CarrinhoSessao();
        $controlador = new ControleCarrinho($CarrinhoSessao);
        $controlador->AlteraQuantidadeCarrinho();
        break;

    case "apagaitemcarrinho":
        require "Controller/ControleCarrinho.php";
        require_once 'Model/CarrinhoSessao.php';
        $CarrinhoSessao = new CarrinhoSessao();
        $controlador = new ControleCarrinho($CarrinhoSessao);
        $controlador->ApagaItemCarrinho();
        break;

    case "finalizarcompra":
        require "Controller/ControlePedido.php";
        require_once 'Model/CarrinhoSessao.php';
        require_once 'Model/Cliente.php';
        $CarrinhoSessao = new CarrinhoSessao();
        $cliente = new Cliente();
        $cliente->setIdcliente($_SESSION["idcliente"]);
        $cliente->setIDUsuario($_SESSION["idusuario"]);
        ControlePedido::realizarPedido($CarrinhoSessao, $cliente);

    default:
        require "view/index.php";
        break;
}
require "view/footer.php";
?>