<?php
    
	
	//testa a variável url que veio lá do htaccess
	if (isset($_GET['url'])) //se estiver preenchida, pega o valor
	  {
            $url =  strtoupper($_GET['url']);
    		switch ($url){
	    		case "NOVOLIVRO":
					require "Controller/LivroNovo.php";    
				    $controlador = new LivroNovo();
					$controlador->processaRequisicao();
					break;
			    case "LISTARLIVRO":
					require "Controller/LivroListar.php";				
	                $controlador = new LivroListar();
					$controlador->processaRequisicao();
					break;
				default:
				    require "Controller/LivroListar.php";				
					$controlador = new LivroListar();
				    $controlador->processaRequisicao();
				    break;
			  }
			  }
			  else                     //senão, vai para uma página padrão, neste caso a home do site
                $url = '404.php';
?>
	