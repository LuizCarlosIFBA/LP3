<?php
  $logado = false;
  if(isset($_SESSION["usuario"])){
    header("Location: Home");
    exit();
  }
?>

<?php $tituloPagina = "Login";
require_once "Cabecalho.php";?>
  <style>
    /*Colunas de tabelas*/
    table.table > tbody > tr > td{
      border-top: 0px;
      border-bottom: 0;
    }
    .panel-default > .panel-heading > .panel-title{
      color: white;
      font-weight: bold;
    }
    .panel-default > .panel-heading{
      background-color: darkcyan;
    }
    .panel-default > .panel-body{
      background-color: #FAFAFA;
    }
    /*Animação*/
    .mask.full, .circle .fill {
      animation: fill ease-in-out 3s;
      transform: rotate(72deg);
    }
    /*Regras de começo e fim*/
    @keyframes fill{
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(72deg);
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

          <li><a class="l1" href="Carrinho"><span
                class="glyphicon glyphicon-shopping-cart"></span> Meu carrinho</a></li>

          <li><a class="l1" href="Login"><span class="glyphicon glyphicon-log-in"></span>
              Login</a></li>

        </ul>

      </div>

    </div>
  </nav>

  <!--------------------------------------------------------------->
  
  <?php
    if(isset($_SESSION["identificar"])) {
  ?>

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

                  <div class="inside-circle"> 40% </div>
      
                </div>
              </div>
            </td>

            
            <td>
              &nbsp;&nbsp;
            </td>
           
            <td>
              <span class="active glyphicon glyphicon-shopping-cart  f10 f19 f20"></span>
              <p class="f2 f19">Carrinho</p>
            </td>
          
            <td>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            &nbsp;&nbsp;
            </td>
            
            <td>
              <span class="glyphicon glyphicon-user f2 f10 f20"></span>
              <p class="f2 f13">Identificação</p>
            </td>
            
            <td>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            &nbsp;&nbsp;
            </td>
                        
            <td>
              <span class="glyphicon glyphicon-credit-card f10 f19 f20"></span>
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
              <span class="glyphicon glyphicon-ok-sign f10 f19 f20"></span>
              <p class="f2 f19">Concluir</p>
            </td>
            
          </tr>
        </table>
      </div>

      <div class="col-sm-3"></div>
      
    </div>
  </div>

  <p>&nbsp;</p>

  <?php
    }
    else {
  ?>

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

  <?php
    }
  ?>
  
  <!--------------------------------------------------------------->

  <?php
    if(isset($_SESSION["invalido"])) {
  ?>

  <div class="row mt-5">
    <div class="col-md-4 col-md-offset-4">  
      <div class="alert alert-danger">
        <p><strong>ERRO:</strong> Usuário ou senha inválidos.</p>
      </div>

  <?php
    }
    else {
  ?>

  <p>&nbsp;</p>
  <br><br>
  

  <div class="row mt-5">
    <div class="col-md-4 col-md-offset-4">

  <?php   
    }
    unset($_SESSION["invalido"]);
  ?>

      <div class="panel panel-default">

        <div class="panel-heading text-center">
          <p class="panel-title">Fazer Login</p>
        </div>

        <div class="panel-body">

          <form class="f20" action="Logar" method="post">

            <div class="form-group">
              <label for="email" class="f8 f13"><i class="fa fa-envelope f3"></i> Email:</label>
              <input type="email" class="form-control" name="email" placeholder="Digite seu email" required>
            </div>

            <div class="form-group">
              <label for="senha" class="f8 f13"><i class="fa fa-lock f3"></i> Senha:</label>
              <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
            </div>

            &nbsp;

            <div class="form-group">
              <button type="submit" class="btn btn-info">Entrar</button>
              &nbsp;&nbsp;
              <a href="Cadastro" class="f2 f13">Não tem uma conta? Cadastre-se aqui</a>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
