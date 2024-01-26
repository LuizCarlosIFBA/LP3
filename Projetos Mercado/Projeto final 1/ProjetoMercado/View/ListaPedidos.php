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
  $listaPedidos = array();
  if(isset($_SESSION["listapedidos"])){
    $listaPedidos = unserialize($_SESSION["listapedidos"]);
  }
  $valorFinal = 0;
  if (isset($_SESSION["valorFinal"])){
    $valorFinal = $_SESSION["valorFinal"];
  } 
?>

<?php $tituloPagina = "ListaPedidos";
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

  <p>&nbsp;</p><p>&nbsp;</p>
  
  <div class="container">
    <div class="row">

      <!--Coluna 1 - Seleção de categorias -->
      <div class="col-sm-3 f22 text-left">

        <p>&nbsp;</p>
        <p class="f2 f12">&nbsp;<i class="f3 fa-solid fa-book"></i> Categorias</p>

        <hr>

        <p class="f8 f13 f24">Mostre pedidos que precisam de:</p>

        <form action="/action_page.php">

          <div class="checkbox f8 f24">
          
            <p class="f29">
              <label><input type="checkbox" value="">Preparo</label>
            </p>
        
            <p class="f29">
              <label><input type="checkbox" value="">Checagem</label>
            </p>

            <p class="f29">
              <label><input type="checkbox" value="">Empacotamento</label> 
            </p>

            <p class="f29">
              <label><input type="checkbox" value="">Entrega</label> 
            </p> 
            
          </div>
        </form>

        <p>&nbsp;</p>
                
      </div>

<!--------------------------------------------------------------->

      <!--Coluna 2 - Espaço-->
      <div class="col-sm-1">
        &nbsp;
      </div>

      <!--Coluna 3 - Lista de pedidos-->
      <div class="col-sm-8 f22">

        <p>&nbsp;</p>

        <table class="table">
          <tr>
            <td><p class="f2 f12"><i class="f3 fa-solid fa-bag-shopping"></i> Pedidos</p></td>
            <td class="text-right">
              <form action="EsconderTudoListaPedidos"> 
                <button type="submit" class="f3 f13 f25a"><i class="fa-solid fa-eye-slash"></i> &nbsp;Esconder todos os pedidos</button>
              </form>
            </td>
          </tr>
        </table>

        <table class="table table-hover">

          <!--Head-->
          <tr class="f27">
            
            <th>
              <p class="f8 f20 f26 text-center">Pedido</p>
            </th>
            
            <th>
              <p class="f8 f20 f26 text-center">Aguardando</p>
              
            </th>
            
            <th>
              <p class="f8 f20 f26 text-center">Número de itens</p>
              
            </th>
            
            <th>
              <p class="f8 f20 f26 text-center">Valor total</p>
            </th>

            <th>
              <p class="f8 f20 f26 text-center">Ação</p>
            </th>
            
          </tr>

          <?php for($i=0;$i<count($listaPedidos);$i++){ ?>

          <!--Pedido-->
          <tr class="f27">
                
            <td>
              <p>&nbsp;</p>
              <p class="f2 f13 f26 text-center"><?php #echo $listaPedidos[$i]->getIdPedido();?></p>
              <p>&nbsp;</p>
            </td>

            <td>
              <p>&nbsp;</p>
              <p class="f13 f26 text-center">-</p>
              <p>&nbsp;</p>
            </td>

            <td>
              <p>&nbsp;</p> 
              <p class="f13 text-center">-</p>
              <p>&nbsp;</p>
            </td>

            <td>
              <p>&nbsp;</p>
              <p class="f2 f13 f26 text-center">R$ -</p>
              <p>&nbsp;</p>
            </td>
            
            <td>
              
              <div class="text-center"><a href="VisualizarPedido" class="l12 text-center"><i class="fa-solid fa-eye"></i> &nbsp;Visualizar</a></div>
              <p class="text-center"><button type="button" class="f3 f13 f25a f26"><i class="fa-solid fa-eye-slash"></i> &nbsp;Esconder</button></p>
              
            </td>
            
          </tr>

          <?php } ?>
          
        </table>
        
      </div>
      
    </div>
  </div>

  <p>&nbsp;</p>

<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
