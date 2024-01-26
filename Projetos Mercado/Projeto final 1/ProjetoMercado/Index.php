<?php
   session_start();
   require_once "Model/BO/PregReplace.php";
   require_once "Model/BO/Usuario.php";

   if (isset($_GET['url'])) {
      $url = strtoupper($_GET["url"]);
      switch ($url){
         #---------------------------------------
         case "ATENDIMENTO":
            require "View/Atendimento.php";
            break;
         case "CADASTRO":
            require "View/Cadastro.php";
            break;
         case "CARRINHO":
            require "View/Carrinho.php";
            break;
         case "CONCLUIR":
            require "View/Concluir.php";
            break;
         case "CONFIRMACAO":
            require "View/Confirmacao.php";
            break;
         case "FEEDBACK":
            require "View/Feedback.php";
            break;
         case "LISTAPEDIDOS":
            require "View/ListaPedidos.php";
            break;
         case "LISTAPRODUTOS":
            require "View/ListaProdutos.php";
            break;
         case "LOGIN":
            require "View/Login.php";
            break;
         case "MINHACONTA":
            require "View/MinhaConta.php";
            break;
         case "PAGAMENTO":
            require "View/Pagamento.php";
            break;
         case "PRODUTO":
            require "View/Produto.php";
            break;
         case "VISUALIZARPEDIDO":
            require "View/VisualizarPedido.php";
            break;
         #---------------------------------------
         case "SAIR":
            session_destroy();
            header("Location: Home");
            break;
         #---------------------------------------
         case "CADASTRAR":
            require "Controller/ControladorUsuario.php";    
            $controlador = new ControladorUsuario();
            $controlador->processaRequisicao("C");
            break;
         case "LOGAR":
            require "Controller/ControladorUsuario.php";    
            $controlador = new ControladorUsuario();
            $controlador->processaRequisicao("L");
            break;
         case "BUSCAR":
            require "Controller/ControladorProduto.php";    
            $controlador = new ControladorProduto();
            $controlador->processaRequisicao("B");
            break;
         case "PESQUISARCATEGORIA":
            require "Controller/ControladorCategoria.php";    
            $controlador = new ControladorCategoria();
            $controlador->processaRequisicao("PC");
            break;
         case "RELACIONADOS":
            require "Controller/ControladorProduto.php";    
            $controlador = new ControladorProduto();
            $controlador->processaRequisicao("PR");
            break;
         case "PESQUISARPRODUTO":
            require "Controller/ControladorProduto.php";    
            $controlador = new ControladorProduto();
            $controlador->processaRequisicao("PP");
            break;
         case "LISTARPRODUTOS":
            require "Controller/ControladorProduto.php";    
            $controlador = new ControladorProduto();
            $controlador->processaRequisicao("LP");
            break;
         case "ADICIONARCARRINHO":
            require "Controller/ControladorCarrinho.php";  
            $controlador = new ControladorCarrinho();
            $controlador->processaRequisicao("AC");
            break;
         case "REMOVERCARRINHO":
            require "Controller/ControladorCarrinho.php";  
            $controlador = new ControladorCarrinho();
            $controlador->processaRequisicao("RC");
            break;
         case "REMOVERTUDOCARRINHO":
            require "Controller/ControladorCarrinho.php"; 
            $controlador = new ControladorCarrinho();
            $controlador->processaRequisicao("RTC");
            break;
         case "ATUALIZARQUANTIDADE":
            require "Controller/ControladorCarrinho.php"; 
            $controlador = new ControladorCarrinho();
            $controlador->processaRequisicao("AQ");
            break;
         case "APLICARDESCONTO":
            require "Controller/ControladorCarrinho.php"; 
            $controlador = new ControladorCarrinho();
            $controlador->processaRequisicao("AD");
            break;
         case "CADASTRARCARTAO":
            require "Controller/ControladorPagamento.php"; 
            $controlador = new ControladorPagamento();
            $controlador->processaRequisicao("CC");
            break;
         case "VOLTARENDERECO":
            $_SESSION["voltar"] = 1;
            require "View/Cadastro.php";
            break;
         case "VOLTARPAGAMENTO":
            $_SESSION["voltar"] = 1;
            require "View/Pagamento.php";
            break;
         case "ALTERARDADOSCARTAO":
            require "Controller/ControladorPagamento.php"; 
            $controlador = new ControladorPagamento();
            $controlador->processaRequisicao("ADC");
            break;
         case "ALTERARENDERECO":
            require "Controller/ControladorUsuario.php"; 
            $controlador = new ControladorUsuario();
            $controlador->processaRequisicao("AE");
            break;
         case "CRIARPEDIDO":
            require "Controller/ControladorPedido.php"; 
            $controlador = new ControladorPedido();
            $controlador->processaRequisicao("CP");
            break;
         case "REGISTRARPAGAMENTO":
            require "Controller/ControladorPagamento.php"; 
            $controlador = new ControladorPagamento();
            $controlador->processaRequisicao("RP");
            break;
         case "REGISTRARSITUACAO":
            require "Controller/ControladorSituacao.php"; 
            $controlador = new ControladorSituacao();
            $controlador->processaRequisicao("RS");
            break;
         case "CADASTRARFEEDBACK":
            require "Controller/ControladorFeedback.php"; 
            $controlador = new ControladorFeedback();
            $controlador->processaRequisicao("CF");
            break;
         case "LISTARTODOSPEDIDOS":
            require "Controller/ControladorPedido.php"; 
            $controlador = new ControladorPedido();
            $controlador->processaRequisicao("LTP");
            break;                
         case "CANCELARPEDIDO":
            require "Controller/ControladorPedido.php"; 
            $controlador = new ControladorPedido();
            $controlador->processaRequisicao("CP");
            break;
         case "FILTRARCATEGORIA":
            require "Controller/ControladorCategoria.php"; 
            $controlador = new ControladorCategoria();
            $controlador->processaRequisicao("FC");
            break;     
         default:
            require "View/Mercado.php";
            break;
      }
   } 
   else {
      require "404.php";
   }

?>
