<?php
  $logado = false;
  if(isset($_SESSION["usuario"])){
    $logado = true;
    $usuario = new Usuario();
    $usuario = unserialize($_SESSION["usuario"]); 
  }
  else {
    header("Location: Home");
    exit();
  }
?>

<?php $tituloPagina = "VisualizarPedido";
require_once "Cabecalho.php";?>
  <style>
    /*Colunas de tabelas*/
    table.table > tbody > tr > td{
      border-top: 0px;
      border-bottom: 0;
    }
    button.btn-default, button.btn-default:visited {
      color: white;
      background-color: darkcyan;
      border: 2px solid darkcyan;

      font-weight: bold;
      font-size: 16px;
      white-space: nowrap;
    
      padding: 15px;
      padding-right: 60px;
      padding-left: 60px;
  
      opacity: 0.6;
      transition: 0.3s;
      
      display: inline-block;
    }   
    button.btn-default:hover, button.btn-default:active {
      color: darkblue;
      background-color: darkcyan;
      border: 2px solid darkcyan;
      opacity: 1;      
    }   
    /*Animação*/
    .mask.full, .circle .fill {
      animation: fill ease-in-out 3s;
      transform: rotate(144deg);
    }
    /*Regras de começo e fim*/
    @keyframes fill{
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(144deg);
      }
    }
  </style>
</head>

<!--------------------------------------------------------------->

<body>
  <!--Barra de navegação-->
  <nav class="navbar"> 
  <div class=" container-fluid">

    <div class="navbar-header">

      <!--Botão das 3 barras na direita quando a tela está comprimida-->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="glyphicon glyphicon-menu-hamburger"></span>
      </button>

      <!--Logo com link-->
      <a class="navbar-brand l2" href="Mercado">Mercado</a>

    </div>

    <!--Conteúdo da barra de navegação + Collapse-->
    <div class="collapse navbar-collapse" id="myNavbar">

      <!--Tópicos da barra de navegação-->
      <ul class="nav navbar-nav">

        <li><a class="l1" href="ListarProdutos">Produtos</a></li>
      <?php if($logado) { ?>
        <li><a class="l1" href="Atendimento">Atendimento</a></li>
      <?php } ?>

      </ul>

      <!--Formulário de pesquisa-->
      <form class="navbar-form navbar-left" action="Buscar" method="post">
        <div class="input-group">
          <input type="text" class="form-control" size="30" name="nome" placeholder="Qual produto deseja encontrar?">
          <div class="input-group-btn">
            <button class="btn btn-info search" type="submit">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </div>
        </div>
      </form>

      <!--Login e carrinho-->
      <ul class="nav navbar-nav navbar-right">

        <li><a class="l1" href="Carrinho"><span class="glyphicon glyphicon-shopping-cart"></span> Meu carrinho</a></li>
        
        <?php
          if($logado) {
            if($usuario->getPermissao() == 1) {
        ?>
        <li><a class="l1" href="ListarTodosPedidos"><i class="fa-solid fa-clipboard"></i> Visualizar pedidos</a></li>
        <?php
            }
        ?>

        <li class="dropdown">
          <a class="l1 dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="glyphicon glyphicon-user"></span> 

              <?php 
              if (substr_count($usuario->getNome(), " ") > 0) {
                echo strstr($usuario->getNome(), " ", true);
              }
              else {
                echo $usuario->getNome();
              }
              ?>

            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="MinhaConta">Minha conta </a></li>
            <li><a href="Sair">Sair</a></li>
          </ul>
        </li>

        <?php
          }
          else {
        ?>

        <li><a class="l1" href="Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        
        <?php
          }
        ?>

      </ul>

    </div>

    </div>
  </nav>

<!--------------------------------------------------------------->

  <p>&nbsp;</p>
  
  <div class="container">
    <div class="row">

      <!--Funcionários -->
      <div class="col-sm-6">
        <div class="row">
          <div class="col-sm-12 f22">
            
            <p>&nbsp;</p>
            <p class="f2 f12">&nbsp;<i class="f3 fa-solid fa-user-check"></i> Funcionários</p>
            <p>&nbsp;</p>
        
            <table class="table">

              <!--Head-->
              <tr>
            
                <th>
                  <p class="f8 f20 f26 text-center">Etapa</p>
                </th>
            
                <th>
                  <p class="f8 f20 f26 text-center">Funcionário</p>
                </th>

                <th>
                  <p class="f8 f20 f26 text-center">Conclusão</p>
                </th>
            
              </tr>

              <!--Preparo-->
              <tr class="f27">
                
                <td>
                  <p class="f8 f30b text-center">Preparo</p>
                </td>

                <td>
                  <form action="/action_page.php" class="f20">
                    <div class="form-group">
                      <input type="text" id="nome1" class="form-control" size=18 value="Tiago Cerqueira Filho">
                    </div>
                  </form>
                </td>

                <td>
                  <form action="/action_page.php" class="f30b">
                
                    <p class="checkbox text-center">
                      <label><input type="checkbox" value=""></label>
                    </p>
                
                  </form>
                </td>
            
              </tr>

              <!--Checagem-->
              <tr class="f27">
                
                <td>
                  <p class="f8 f30b text-center">Checagem</p>
                </td>

                <td>
                  <form action="/action_page.php" class="f20">
                    <div class="form-group">
                      <input type="text" id="nome2" class="form-control" size=18 value="" disabled>
                    </div>
                  </form>
                </td>

                <td>
                  <form action="/action_page.php" class="f30b">
                
                    <p class="checkbox text-center">
                      <label><input type="checkbox" value="" disabled></label>
                    </p>
                
                  </form>
                </td>
            
              </tr>

              <!--Empacotamento-->
              <tr class="f27">
                
                <td>
                  <p class="f8 f30b text-center">Empacotamento</p>
                </td>

                <td>
                  <form action="/action_page.php" class="f20">
                    <div class="form-group">
                      <input type="text" id="nome3" class="form-control" size=18 value="" disabled>
                    </div>
                  </form>
                </td>

                <td>
                  <form action="/action_page.php" class="f30b">
                
                    <p class="checkbox text-center">
                      <label><input type="checkbox" value="" disabled></label>
                    </p>
                
                  </form>
                </td>
            
              </tr>

              <!--Entrega-->
              <tr class="f27">
                
                <td>
                  <p class="f8 f30b text-center">Entrega</p>
                </td>

                <td>
                  <form action="/action_page.php" class="f20">
                    <div class="form-group">
                      <input type="text" id="nome4" class="form-control" size=18 value="" disabled>
                    </div>
                  </form>
              
                </td>

                <td>
                  <form action="/action_page.php" class="f30b">
                
                    <p class="checkbox text-center">
                      <label><input type="checkbox" value="" disabled></label>
                    </p>
                
                  </form>
                </td>
            
              </tr>
          
              <!--Apenas para gerar a linha de borda-->
              <tr class="f27"></tr>
          
            </table>
        
          </div>
        </div>

<!--------------------------------------------------------------->

        <p>&nbsp;</p>
        
        <!--Botões-->
        <div class="row">
          <div class="col-sm-1"></div>
          
          
          <div class="col-sm-2">
            <a href="ListaPedidos" class="l11b"><span class="glyphicon glyphicon-chevron-left"></span> Voltar</a>            
          </div>
          

          <div class="col-sm-4"></div>
          
          
          <div class="col-sm-2">
            <a href="ListaPedidos" class="l13"><i class="fa-solid fa-xmark"></i> &nbsp;Produto faltando</a>                          
          </div>
          
          
          <div class="col-sm-3"></div>
        </div>
        
      </div>
          
<!--------------------------------------------------------------->
      
      <div class="col-sm-1"></div>
      
      <!--Itens -->
      <div class="col-sm-5 f22">
        <p>&nbsp;</p>
        <p class="f2 f12">&nbsp;<i class="f3 fa-solid fa-basket-shopping"></i> Itens</p>
        <p>&nbsp;</p>
        
        
        <table class="table">

          <!--Head-->
          <tr>
            
            <th>
              <p class="f8 f20 f26 text-center">Produto</p>
            </th>

            <!--Espaçamento-->
            <th>
              <p>&nbsp;</p>
            </th>
            
            <th>
              <p class="f8 f20 f26 text-center">Quantidade</p>
            </th>

            <!--Espaçamento-->
            <th>
              <p>&nbsp;</p>
            </th>

            <th>
              <p>&nbsp;</p>
            </th>
            
            <th>
              <p class="f8 f20 f26 text-center">Checagem</p>
            </th>
            
          </tr>
              
          <!--Produto 1-->
          <tr class="f27">
                
            <td>
              <p>&nbsp;</p>
                  
              <div class="media">

                <!--Imagem do produto-->
                <div class="media-left">
                  <img src="View/Imagens/Feijão.png" class="media-object imagem5">
                </div>

                <!--Descrição-->
                <div class="media-body">
                  <p class="media-heading f8">Kicaldo</p>
                  <p class="f13">Feijão Carioca Pacote 1Kg Kicaldo</p>
                </div>
                    
              </div>
              <p>&nbsp;</p>
            </td>

            <!--Espaçamento-->
            <td>
              <p>&nbsp;</p>
            </td>
            
            <td>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p class="f13 f26 text-center">10 unidades </p>
            </td>

            <!--Espaçamento-->
            <td>
              <p>&nbsp;</p>
            </td>

            <td>
              <p>&nbsp;</p>
            </td>
            
            <td>
              <p>&nbsp;</p>
              <form action="/action_page.php" class="f30">
                
                <p class="checkbox f29 text-center">
                  <label><input type="checkbox" value="" disabled></label>
                </p>
                
              </form>
            </td>
                
          </tr>
              
          <!--Produto 2-->
          <tr class="f27">
                
            <td>
              <p>&nbsp;</p>
                  
              <div class="media">

                <!--Imagem do produto-->
                <div class="media-left">
                  <img src="View/Imagens/Brownie.png" class="media-object imagem5">
                </div>

                <!--Descrição-->
                <div class="media-body">
                  <p class="media-heading f8">Fleischmann</p>
                  <p class="f13">Mistura para Bolo Brownie Fleischmann 400g</p>
                </div>
                    
              </div>
              
              <p>&nbsp;</p>
            </td>

            <!--Espaçamento-->
            <td>
              <p>&nbsp;</p>
            </td>
            
            <td>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p class="f13 f26 text-center">05 unidades </p>
            </td>

            <!--Espaçamento-->
            <td>
              <p>&nbsp;</p>
            </td>

            <td>
              <p>&nbsp;</p>
            </td>

            <td>
              <p>&nbsp;</p>
              <form action="/action_page.php" class="f30">
                
                <p class="checkbox f29 text-center">
                  <label><input type="checkbox" value="" disabled></label>
                </p>
                
              </form>
              
            </td>
                
          </tr>

          <!--Apenas para gerar a linha de borda-->
          <tr class="f27"></tr>
              
        </table>

        <p>&nbsp;</p>
        
      </div>
      
    </div>
  </div>

<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
