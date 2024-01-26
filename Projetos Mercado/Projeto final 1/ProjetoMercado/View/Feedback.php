<?php
require_once "Model/BO/Pedido.php";

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
  if(isset($_SESSION["pedido"])){
    $pedido = new Pedido();
    $pedido = unserialize($_SESSION["pedido"]);
  }
?>

<?php $tituloPagina = "Feedback";
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
      
      <div class="col-sm-2"></div>
      
      <div class="col-sm-8 f22">
        
        <p>&nbsp;</p>
        <p class="f2 f12">&nbsp;<span class="f3 glyphicon glyphicon-pencil"></span> Feedback</p>

        <hr>

        <form class="form" action="cadastrarFeedback" method="post">

          <div class="form-group">
            <label class="f8" for="estrelas">De 1 a 5, qual foi sua avaliação sobre o serviço? </label>

            <div class="radio">
              <label><input type="radio" name="estrelas" value=1>
                <span class="f28 glyphicon glyphicon-star"></span>
              </label>
            </div>

            <div class="radio">
              <label><input type="radio" name="estrelas" value=2>
                <span class="f28 glyphicon glyphicon-star"></span>
                <span class="f28 glyphicon glyphicon-star"></span>
              </label>
            </div>

            <div class="radio">
              <label><input type="radio" name="estrelas" value=3>
                <span class="f28 glyphicon glyphicon-star"></span>
                <span class="f28 glyphicon glyphicon-star"></span>
                <span class="f28 glyphicon glyphicon-star"></span>
              </label>
            </div>

            <div class="radio">
              <label><input type="radio" name="estrelas" value=4>
                <span class="f28 glyphicon glyphicon-star"></span>
                <span class="f28 glyphicon glyphicon-star"></span>
                <span class="f28 glyphicon glyphicon-star"></span>
                <span class="f28 glyphicon glyphicon-star"></span>
              </label>
            </div>

            <div class="radio">
              <label><input type="radio" name="estrelas" value=5>
                <span class="f28 glyphicon glyphicon-star"></span>
                <span class="f28 glyphicon glyphicon-star"></span>
                <span class="f28 glyphicon glyphicon-star"></span>
                <span class="f28 glyphicon glyphicon-star"></span>
                <span class="f28 glyphicon glyphicon-star"></span>
              </label>
            </div>
          </div>
          
          <div class="form-group">
            <label class="f8" for="feedback">E qual a sua opinião sobre o serviço? </label>
            <textarea type="text" name="opiniao" class="form-control" rows="5"></textarea>
          </div>

          <p>&nbsp;</p>
              <div class="form-group f23b">
                <input type="hidden" name="idpedido" value="<?php echo $pedido->getIdPedido();?>">
                <button type="submit" class="btn btn-default f23">Enviar</button>
              </div>

              <p>&nbsp;</p>
        </form>
        
      </div>
      
      <div class="col-sm-2"></div>
      
    </div>
  </div>

  <p>&nbsp;</p><p>&nbsp;</p>

<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
