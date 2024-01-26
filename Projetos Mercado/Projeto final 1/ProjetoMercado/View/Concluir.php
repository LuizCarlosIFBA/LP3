<?php
require_once "Model/BO/Feedback.php";

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
  if(isset($_SESSION["feedback"])){
    $feedback = new Feedback();
    $feedback = unserialize($_SESSION["feedback"]);
  }
?>

<?php $tituloPagina = "Conclusão";
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
    
      padding: 10px;
      padding-right: 25px;
      padding-left: 25px;
  
      opacity: 0.6;
      transition: 0.3s;
      
      display: inline-block;
    }    
    button.btn-default:hover, button.btn-default:active {
      color: lightblue;
      background-color: darkcyan;
      border: 2px solid darkcyan;
      opacity: 1;      
    } 
    /*Animação*/
    .mask.full, .circle .fill {
      animation: fill ease-in-out 3s;
      transform: rotate(180deg);
    }
    /*Regras de começo e fim*/
    @keyframes fill{
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(180deg);
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
  
  <div class="container text-center">
    <div class="row">
      
      <div class="col-sm-3"></div>
      
      <div class="col-sm-6 f21">
        <table class="table">
          <tr>

            <td>
              <div class="circle-wrap">
                <div class="circle">
      
                  <div class="mask full">
                    <div class="fill"></div>
                  </div>

                  <div class="mask half">
                    <div class="fill"></div>
                  </div>

                  <div class="inside-circle"> 100% </div>
      
                </div>
              </div>
            </td>

            
            <td>
              &nbsp;&nbsp;
            </td>

            
            <td>
              <span class="glyphicon glyphicon-shopping-cart f10 f19 f20"></span>
              <p class="f2 f19">Carrinho</p>
            </td>

            
            <td>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            &nbsp;&nbsp;
            </td>

            
            <td>
              <span class="glyphicon glyphicon-user f10 f19 f20"></span>
              <p class="f2 f19">Identificação</p>
            </td>
            

            <td>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            &nbsp;&nbsp;
            </td>
            
            
            <td>
              <span class="active glyphicon glyphicon-credit-card f10 f19 f20"></span>
              <p class="f2 f19">Pagamento</p>
            </td>
            

            <td>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            &nbsp;&nbsp;
            </td>
            
            
            <td>
              <span class="glyphicon glyphicon-eye-open f10 f19 f20"></span>
              <p class="f2 f19">Confirmação</p>
            </td>
            

            <td>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            &nbsp;&nbsp;
            </td>
            
            
            <td>
              <span class="glyphicon glyphicon-ok-sign f2 f10 f20"></span>
              <p class="f2 f13">Concluir</p>
            </td>
            
          </tr>
        </table>
      </div>

      <div class="col-sm-3"></div>
      
    </div>
  </div>

<!--------------------------------------------------------------->

  <p>&nbsp;</p>
  
  <div class="container">
    <div class="row">
      <div class="col-sm-3"></div>

      <div class="col-sm-6 f22 text-center">
        <p>&nbsp;</p>
        <p class="f2 f12 f26">&nbsp;<span class="f3 glyphicon glyphicon-thumbs-up"></span> Agradeçemos pela preferência!</p>
        <p>&nbsp;</p>
      </div>
      
      <div class="col-sm-3"></div>
    </div>
  </div>
  
  <p>&nbsp;</p>
  
  <div class="container">
    <div class="row">
      
      <div class="col-sm-1"></div>
      
      <div class="col-sm-10 f22">
        
        <p>&nbsp;</p>
        <p class="f2 f12">&nbsp;<span class="f3 glyphicon glyphicon-tasks"></span> Acompanhamento do pedido</p>

        <hr>

        <table class="table text-center">
          <tr>

            <td>
              <i class="fa-solid fa-basket-shopping f3 f10 f20"></i>
              <p class="f3 f13">Preparo</p>
            </td>
            

            <td>
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            </td>
            
            
            <td>
              <span class="active glyphicon glyphicon-list-alt f3 f10 f20"></span>
              <p class="f3 f13">Checagem</p>
            </td>
            

            <td>
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            </td>
            
            
            <td>
              <i class="fa-solid fa-box f10 f19 f20"></i>
              <p class="f2 f19">Empacotamento</p>
            </td>
            

            <td>
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            </td>

            <td>
              <span class="glyphicon glyphicon-road f10 f19 f20"></span>
              <p class="f2 f19">Em trânsito</p>
            </td>
            

            <td>
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            </td>
            
            
            <td>
              <span class="glyphicon glyphicon-ok-sign f10 f19 f20"></span>
              <p class="f2 f19">Entregue</p>
            </td>
            
          </tr>
        </table>
        
        <div class="progress">
          <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
            
            40%
            
          </div>
        </div>
        
      </div>

      <div class="col-sm-1"></div>
      
    </div>
  </div>

  <!--------------------------------------------------------------->

  <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
  
  <div class="container">
    <div class="row">
      
      <div class="col-sm-3 text-right">
        <a class="l11" href="Mercado">&nbsp;&nbsp;<span class="glyphicon glyphicon-chevron-left"></span> Página inicial</a>
      </div>
      
      <div class="col-sm-6"></div>

      <div class="col-sm-3 text-left">
        <?php if(!isset($_SESSION["feedback"])) { ?>
          <a class="l11" href="Feedback">&nbsp;&nbsp;Dar Feedback <span class="glyphicon glyphicon-chevron-right"></span></a>  
        <?php } else {?>

        <?php }?>
      </div>
      
    </div>
  </div>  

<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
