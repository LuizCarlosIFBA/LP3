<?php
  $logado = false;
  if(isset($_SESSION["usuario"])){
    $logado = true;
    $usuario = new Usuario();
    $usuario = unserialize($_SESSION["usuario"]);
  }
?>

<?php $tituloPagina = "Mercado";
require_once "Cabecalho.php";?>
  <style>
    /*Configurações do carrossel*/
    .carousel-inner img {
      width: 100%;
      margin: auto;
      min-height: 200px; /*Altura mínima*/ 
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
        <a class="navbar-brand l2" href="Home">Mercado</a>

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

  <!--Carrossel-->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- Indicadores -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <!--Primeiro a mostrar-->
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Conteúdo do carrossel -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <!--Primeiro a mostrar-->
        <img src="https://www.extra-imagens.com.br/criacao/01-home/banner-tv/2023/04-abr/05/btv04-limpeza.png"
          alt="Image">

        <div class="carousel-caption">
          <!--h3>Propaganda 1</h3>
          <p>Descrição</p-->
        </div>

      </div>

      <div class="item">
        <img src="https://www.extra-imagens.com.br/criacao/01-home/banner-tv/2023/04-abr/10/btv-Cha-fraldas.jpg" alt="Image">

        <div class="carousel-caption">
          <!--h3>Propaganda 2</h3>
          <p>Descrição</p-->
        </div>

      </div>

    </div>

    <!-- Setas da esquerda e da direita -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>

    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Próximo</span>
    </a>

  </div>

<!--------------------------------------------------------------->
  
  <!--Produtos-->
  <div class="container">
    <div class="row">
      
      <!--Produtos-->
      <div class="col-sm-9">

        <div class="row">
          <div class="col-sm-3"></div>
          
          <div class="col-sm-4">
            <p>&nbsp;</p>
            <div class="f1 f2 f13 f26">Produtos em promoção</div>
            <p>&nbsp;</p>
          </div>

          <div class="col-sm-7"></div>
        </div>
        
        <div class="row">
          <div class="col-sm-12">

            <table align="center">
              
              <tr> 
                
                <!--Produto 1-->
                <td class="l8">
              
                  <a href="Produto"><img class="imagem1" src="View/Imagens/Airfryer.png"></a>
              
                  <p class="f13">Airfryer</p>
                  <p>&nbsp;</p>
                  <p class="f8 f13">Por:<b class="f3"> R$249,99</b></p>

                  <form action="PesquisarProduto" method="post">
                    <div class="form-group">
                      <input type="hidden" name="idproduto" value="1">
                      <button type="submit" class="btn btn-info visualizar"><span class="glyphicon glyphicon-search"></span> Visualizar</button>
                    </div>
                  </form>
                </td>
                
                <!--Produto 2-->
                <td class="l8">
              
                  <a href="Produto"><img class="imagem1" src="View/Imagens/Iogurte.png"></a>
              
                  <p class="f13">Iogurte</p>
                  <p>&nbsp;</p>
                  <p class="f8 f13">Por:<b class="f3"> R$16,99</b></p>

                  <form action="PesquisarProduto" method="post">
                    <div class="form-group">
                      <input type="hidden" name="idproduto" value="2">
                      <button type="submit" class="btn btn-info visualizar"><span class="glyphicon glyphicon-search"></span> Visualizar</button>
                    </div>
                  </form>
                </td>
                
                <!--Produto 3-->
                <td class="l8">
              
                  <a href="Produto"><img class="imagem1" src="View/Imagens/Açucar.png"></a>
              
                  <p class="f13">Açúcar</p>
                  <p>&nbsp;</p>
                  <p class="f8 f13">Por:<b class="f3"> R$3,78</b></p>

                  <form action="PesquisarProduto" method="post">
                    <div class="form-group">
                      <input type="hidden" name="idproduto" value="3">
                      <button type="submit" class="btn btn-info visualizar"><span class="glyphicon glyphicon-search"></span> Visualizar</button>
                    </div>
                  </form>
                </td>

                </tr>
                <tr>
                  
                <!--Produto 4-->
                <td class="l8">
              
                  <a href="Produto"><img class="imagem1" src="View/Imagens/AguaSanitaria.png"></a>
              
                  <p class="f13">Água Sanitária</p>
                  <p>&nbsp;</p>
                  <p class="f8 f13">Por:<b class="f3"> R$5,25</b></p>

                  <form action="PesquisarProduto" method="post">
                    <div class="form-group">
                      <input type="hidden" name="idproduto" value="4">
                      <button type="submit" class="btn btn-info visualizar"><span class="glyphicon glyphicon-search"></span> Visualizar</button>
                    </div>
                  </form>
                </td>
                
              

                <!--Produto 5-->
                <td class="l8">
              
                  <a href="Produto"><img class="imagem1" src="View/Imagens/PapelHigienico.png"></a>
              
                  <p class="f13">Papel Higiênico</p>
                  <p>&nbsp;</p>
                  <p class="f8 f13">Por:<b class="f3"> R$25,07</b></p>
              
                  <form action="PesquisarProduto" method="post">
                    <div class="form-group">
                      <input type="hidden" name="idproduto" value="5">
                      <button type="submit" class="btn btn-info visualizar"><span class="glyphicon glyphicon-search"></span> Visualizar</button>
                    </div>
                  </form>
                  
                </td>

                <!--Produto 6-->
                <td class="l8">
              
                  <a href="Produto"><img class="imagem1" src="View/Imagens/Liquidificador2.png"></a>
              
                  <p class="f13">Liquidificador</p>
                  <p>&nbsp;</p>
                  <p class="f8 f13">Por:<b class="f3"> R$88,10</b></p>

                  <form action="PesquisarProduto" method="post">
                    <div class="form-group">
                      <input type="hidden" name="idproduto" value="6">
                      <button type="submit" class="btn btn-info visualizar"><span class="glyphicon glyphicon-search"></span> Visualizar</button>
                    </div>
                  </form>
                </td>
              
              </tr>
              
            </table>

          </div>
        </div>
      </div>
      
<!--------------------------------------------------------------->  
      
      <!--Propagandas-->
      <div class="col-sm-3">
        
        <p>&nbsp;</p><p>&nbsp;</p>
        <p>&nbsp;</p><p>&nbsp;</p>
        <p>&nbsp;</p><p>&nbsp;</p>
        <p>&nbsp;</p><p>&nbsp;</p>
      
        
        <a href=""><img class="f19" src="View/Imagens/Propaganda.png"></a>
        
        
        <p>&nbsp;</p><p>&nbsp;</p>
        

        <a href=""><img class="f19" src="View/Imagens/Propaganda 2.png"></a>
        
      </div>
          
    </div>    
  </div>

<!--------------------------------------------------------------->

  <p>&nbsp;</p><p>&nbsp;</p>
  <!--Propaganda-->
  <div class="container text-center">
    <div class="row">
      <div class="col-sm-12">
        <a href=""><img class="f19" src="View/Imagens/Propaganda 5.png"></a>
      </div>
    </div>
  </div>
  
<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
