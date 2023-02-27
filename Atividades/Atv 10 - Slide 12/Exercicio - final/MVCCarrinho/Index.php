<?php
    session_start();
    //página que contem as rotas da aplicação
	 	
	//testa a variável url que veio lá do htaccess
	if (isset($_GET['url'])) //se estiver preenchida, pega o valor
	  {
            $url =  strtoupper($_GET['url']);
    		switch ($url){
	    		case "NOVOLIVRO":
					require "Controller/ControladorFormLivro.php";    
				    $controlador = new ControladorFormLivro();
					$controlador->processaRequisicao();
					break;
				case "INCLUIRLIVRO":
					require "Controller/ControladorNovoLivro.php";    
					$controlador = new ControladorNovoLivro();
					$controlador->processaRequisicao();
					break;
			    case "LISTARLIVRO":
					require "Controller/ControladorLivroListar.php";
                    $controlador = new ControladorLivroListar();
                    $controlador->processaRequisicao();
					break;
				case "ADDITEMCARRINHO":
					require "Controller/ControladorAddItemCarrinho.php";
					require_once 'Model/CarrinhoSession.php';
					$carrinhoSession = new CarrinhoSession();
					$controlador = new ControladorAddItemCarrinho($carrinhoSession);
					$controlador->processaRequisicao();
					break;
				case "CARRINHO":
					require "Controller/ControladorListaCarrinho.php";
					$controlador = new ControladorListaCarrinho();
					$controlador->processaRequisicao();
					break;
				case "CARRINHOALTQUANT":
					require "Controller/ControladorAlteraQuantCarrinho.php";
					require_once 'Model/CarrinhoSession.php';
					$carrinhoSession = new CarrinhoSession();
					$controlador = new ControladorAlteraQuantCarrinho($carrinhoSession);
					$controlador->processaRequisicao();
					break;
				case "APAGAITEMCARRINHO":
					require "Controller/ControladorApagaItemCarrinho.php";
					require_once 'Model/CarrinhoSession.php';
					$carrinhoSession = new CarrinhoSession();
					$controlador = new ControladorApagaItemCarrinho($carrinhoSession);
					$controlador->processaRequisicao();
					break;
				default:
				    require "Controller/ControladorLivroListar.php";
				    $controlador = new ControladorLivroListar();
				    $controlador->processaRequisicao();
				    break;
			  }
			  }
			  else                     //senão, vai para uma página padrão, neste caso a home do site
                $url = '404.php';
?>
	