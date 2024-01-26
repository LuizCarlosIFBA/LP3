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

<?php $tituloPagina = "Atendimento";
require_once "Cabecalho.php";?>
  <style>
    /*Bordas da tabela*/
    table.table {
      border-top: 0;
      border-bottom: 0;
      margin-top:20px;
    }
    /*Linhas da tabela*/
    table.table > tbody > tr > td {
      border-right: ;
      border-left:;
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
      <?php } else {?>

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
        <?php } ?>

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
  
  <div class="container text-center">
    <div class="row">
      
      <!--Texto 1-->
      <p class="f2 f10 f13">Faça seu autoatendimento aqui.</p>
  
    </div>
  </div>

  <p>&nbsp;</p>

  <!--------------------------------------------------------------->
  
  <div class="container text-center">
    <div class="row">
      
      <div class="col-sm-4"></div>

      <!--Primeira tabela-->
      <div class="col-sm-4">
        <div class="panel panel-default">
          <table class="table">
            <tbody>
              <tr>
                <td>
                  
                  <p class="f2 f17"><span class="glyphicon glyphicon-time"></span></p>
                  <p class="f2 f13 f16">Pedidos</p>

                  <p>&nbsp;</p>
                  
                  <p align="left"><a href="Concluir" class="l7 f18" style="padding-right: 115px;"><span class="glyphicon glyphicon-chevron-right"></span> Acompanhar Pedido</a></p>
                  <p align="left"><a href="CancelarPedido" class="l7 f18" style="padding-right: 82px;"><span class="glyphicon glyphicon-chevron-right"></span> Trocar / Cancelar Pedido</a></p> 
                  <p align="left"><a href="Feedback" class="l7 f18" style="padding-right: 200px;"><span class="glyphicon glyphicon-chevron-right"></span> Feedback</a></p>
                  
                </td>                
              </tr>
            </tbody>
          </table>
          
          <div class="panel-body" style="border-top: 0px;"></div>
          
        </div>
      </div>

      <div class="col-sm-4"></div>
      
    </div>
  </div>

<!--------------------------------------------------------------->
  
  <p>&nbsp;</p>

  <div class="container text-center">
    <div class="row">
      
      <!--Texto 2-->
      <p class="f2 f13">Está com dúvidas? Nos contate no: (71) 9 9999-9999 <span class="glyphicon glyphicon-earphone"></span></p>
  
    </div>
  </div>
  
<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
