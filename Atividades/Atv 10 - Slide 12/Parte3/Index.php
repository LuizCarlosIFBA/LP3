<?php
    
	
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
	