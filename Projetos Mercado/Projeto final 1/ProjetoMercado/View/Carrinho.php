<?php 
  require_once "Model/BO/CarrinhoSession.php";
  $logado = false;
  if(isset($_SESSION["usuario"])){
    $logado = true;
    $usuario = new Usuario();
    $usuario = unserialize($_SESSION["usuario"]);
  }
  $valorFrete = 0; $valorDesconto = 0; $valorFinal = 0;
  if (isset($_SESSION["carrinho"])){
    $carrinho = new CarrinhoSession();
    $itensCarrinho = $carrinho->getCarrinhoItens();
    $valorFrete = $carrinho->getValorTotal() * 0.1;

    if (isset($_SESSION["desconto"])) {
      $valorDesconto = $carrinho->getValorTotal() * $_SESSION["desconto"];
      $valorFinal = $carrinho->getValorTotal() + $valorFrete - $valorDesconto;
    } else {
      $valorFinal = $carrinho->getValorTotal() + $valorFrete;
    }

    $_SESSION["frete"] = $valorFrete;
    $_SESSION["desconto"] = $valorDesconto;
    $_SESSION["valorFinal"] = $valorFinal;
  }
?>

<?php $tituloPagina = "Carrinho";
require_once "Cabecalho.php";?>
  <style>
    /*Colunas de tabelas*/
    table.table > tbody > tr > td{
      border-top: 0px;
      border-bottom: 0;
    }
    /*Tamanho do botão vermelho*/
    button.btn-danger, button.btn-danger:visited, button.btn-    danger:hover, button.btn-danger:active{
      padding-right: 40px; 
      padding-left: 40px;
    }
    /*Animação*/
    .mask.full, .circle .fill {
      animation: fill ease-in-out 3s;
      transform: rotate(36deg);
    }
    /*Regras de começo e fim*/
    @keyframes fill{
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(36deg);
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

                  <div class="inside-circle"> 20% </div>
      
                </div>
              </div>
            </td>
            <td>
              &nbsp;&nbsp;
            </td>
            <td>
              <span class="active glyphicon glyphicon-shopping-cart f2 f10 f20"></span>
              <p class="f2 f13">Carrinho</p>
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
<!--------------------------------------------------------------->
  
  <p>&nbsp;</p>

  <!--Container central -->
  <div class="container text-left">
    <!--Linha - Tem 3 colunas-->
    <div class="row">

      <?php if (isset($_SESSION["vazio"])) {?>
        <div class="alert alert-danger">
          <p><strong>ERRO:</strong> O carrinho está vazio, adicione produtos antes de prosseguir.</p>
        </div>
      <?php }?>

      <!--Coluna 1 - Calcular frete e Produtos - Tem 3 linhas-->
      <div class="col-sm-8">

<!--------------------------------------------------------------->
        
        <!--Linha 1 da Coluna 1-->
        <div class="row">
          
          <!--Coluna - Produtos-->
          <div class="col-sm-12 f22">

            <p>&nbsp;</p>

            <table class="table">
              <tr>
                <td><p class="f2 f12"><i class="f3 fa-solid fa-basket-shopping"></i> Produtos</p></td>
                <td class="text-right">
                  <form action="RemoverTudoCarrinho"> 
                    <button type="submit" class="f3 f13 f25a"><i class="fa-solid fa-trash"></i> &nbsp;Remover todos os produtos</button>
                  </form>                  
                </td>
              </tr>
            </table>
            
            <table class="table">
            
            <?php 
            if (isset($itensCarrinho)) {
              foreach($itensCarrinho as $item){ ?>
              <!--Produto-->
              <tr class="f27">
                
                <td>
                  <p>&nbsp;</p>
                  
                  <div class="media">

                    <!--Imagem do produto-->
                    <div class="media-left">
                      <img src="View/Imagens/<?php echo $item->getProduto()->getNomeImagem(); ?>" class="media-object imagem5">
                    </div>

                    <!--Descrição-->
                    <div class="media-body">
                      <p class="media-heading f8"><?php echo $item->getProduto()->getMarca(); ?></p>
                      <p class="f13"><?php echo $item->getProduto()->getNome(); ?></p></p>
                    </div>
                    
                  </div>
                  <p>&nbsp;</p>
                </td>

                <td align="center">
                  <p>&nbsp;</p>
                  
                  <p class="f8">Quantidade</p>
                  
                  <p class="f13">
                    <form class="form-inline" action="AtualizarQuantidade" method="post">
                      <input type="hidden" name="idproduto" value="<?php echo $item->getProduto()->getIdProduto(); ?>">

                      <button type="submit" name="diminuir" class="btn seta"><span class="glyphicon glyphicon-menu-left f2"></span></button>
                    
                      <?php echo $item->getQuantidade(); ?>
                      
                      <button type="submit" name="aumentar" class="btn seta"><span class="glyphicon glyphicon-menu-right f2"></span></button>
                    </form>
                  </p>
                  
                  <form action="RemoverCarrinho" method="post">
                    <input type="hidden" name="idproduto" value="<?php echo $item->getProduto()->getIdProduto(); ?>">
                    <p><button type="submit" class="f3 f13 f25b f26"><i class="fa-solid fa-trash"></i> &nbsp;Remover</button></p>
                  </form>

                  <p>&nbsp;</p>
                </td>

                <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
                
                <td>
                  <p>&nbsp;</p>
                  <p class="f8 f23">Preço</p>
                  <p class="f2 f13 f23 f26">R$ <?php echo number_format($item->getSubTotal(), 2, ',', '.'); ?></p>
                  <p>&nbsp;</p>
                </td>
                
              </tr>

            <?php }} ?>

            </table>     
          </div>
        </div>
        
        <p>&nbsp;</p>

<!--------------------------------------------------------------->

        <!--Linha 2 da Coluna 1-->
        <div class="row">
          <!--Cupom de desconto -->
          <div class="col-sm-12 f22">
            <p>&nbsp;</p>

              <form class="form-inline" action="aplicarDesconto" method="post">
                <div class="form-group">
                  <input type="password" name="cupom" placeholder="Cupom de desconto" class="form-control" size="68">
                </div>
                &nbsp;
                <button type="submit" class="btn btn-danger">APLICAR CUPOM</button>
              </form>
            
            <p>&nbsp;</p>
          </div>
        </div>
        
      </div>

<!--------------------------------------------------------------->
      
      <!--Coluna 2 - Espaço-->
      <div class="col-sm-1">
        &nbsp;
      </div>
      
<!--------------------------------------------------------------->

      <!--Coluna 3 - Resumo -->
      <div class="col-sm-3 f22">
        <p>&nbsp;</p>

        <p class="f2 f12">&nbsp;<span class="f3 glyphicon glyphicon-stats"></span> Resumo</p>

        <p>&nbsp;</p>
        <table class="table">
          <tr>
            <td class="f8"><p>Valor dos produtos: </td>

          <?php if (isset($itensCarrinho)) {?>
            <td class="f8 f13 f23 f24">R$ <?php echo number_format($carrinho->getValorTotal(), 2, ',', '.'); ?></p></td>
          <?php } else {?>
            <td class="f8 f13 f23 f24">R$ 0,00</p></td>
          <?php }?>

          </tr>
          <tr>
            <td class="f8"><p>Frete: </td>
            <td class="f8 f13 f23 f24">R$ <?php echo number_format($valorFrete, 2, ',', '.'); ?></p></td>
          </tr>
          <tr>
            <td class="f8"><p>Desconto: </td>
            <td class="f8 f13 f23 f24">R$ <?php echo number_format($valorDesconto, 2, ',', '.'); ?></p></td>
          </tr>
          <tr>
            <td class="f8"><p>Total: </td>
            <td class="f8 f13 f23 f24">R$ <?php echo number_format($valorFinal, 2, ',', '.'); ?></p></td>
          </tr>
          <tr>
            <td><p></p></td>
          </tr>
          <tr>
            <td colspan="2" class="text-center"><a class="l9" href="Pagamento">&nbsp;&nbsp;IR PARA O PAGAMENTO</a></td>
          </tr>
          <tr>
            <td colspan="2" class="text-center"><a class="l10" href="Mercado">CONTINUAR COMPRANDO</a></td>
          </tr>
        </table>
      </div>
      
    </div>
  </div>

<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
