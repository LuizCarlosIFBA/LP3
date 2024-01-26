<?php
  require_once "Model/BO/Cartao.php";
  require_once "Model/BO/CarrinhoSession.php";
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
  if(isset($_SESSION["cartao"])){
    $cartao = new Cartao();
    $cartao = unserialize($_SESSION["cartao"]);
  }
  $carrinho = new CarrinhoSession();
  if (isset($_SESSION["carrinho"])){
    $itensCarrinho = $carrinho->getCarrinhoItens();
    if($itensCarrinho == NULL) {
      $_SESSION["vazio"] = 1;
      header("Location: Carrinho");
      exit();
    } else if (isset($_SESSION["vazio"])){
      unset($_SESSION["vazio"]);
    }
  }
  $valorFrete = 0; $valorDesconto = 0; $valorFinal = 0;
  if (isset($_SESSION["frete"])) {
    $valorFrete = $_SESSION["frete"];
  }
  if (isset($_SESSION["desconto"])) {
    $valorDesconto = $_SESSION["desconto"];
  }
  if (isset($_SESSION["valorFinal"])){
    $valorFinal = $_SESSION["valorFinal"];
  }
?>

<?php $tituloPagina = "Confirmação";
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

                  <div class="inside-circle"> 80% </div>
      
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
              <span class="glyphicon glyphicon-eye-open f2 f10 f20"></span>
              <p class="f2 f13">Confirmação</p>
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

  <div class="container">
    <div class="row">
      
      <div class="col-sm-2"></div>
      
      <div class="col-sm-8">

        <!--Linha 1-->
        <div class="row">
          <div class="col-sm-12 f22">

            <p>&nbsp;</p>
            <p class="f2 f12">&nbsp;<span class="f3 glyphicon glyphicon-eye-open"></span> Confirmação</p>

            <hr>

            <form class="form-inline" action="/action_page.php">
              <div class="form-group">
                <label class="f8" for="pessoa">Enviando para: </label>
                <input type="text" id="pessoa" class="geral" size=30 value="<?php echo $usuario->getNome();?>" readonly>
              </div>
            </form>

            <hr>

            <table class="table">
              <tr>
                <td class="f8"><p>Valor dos produtos: </td>
                <td class="f8 f13 f23 f24">R$ <?php echo number_format($carrinho->getValorTotal(), 2, ',', '.');?></p></td>
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
            </table>

          </div>
        </div>

        <p>&nbsp;</p>

<!--------------------------------------------------------------->
        
        <!--Linha 2-->
        <div class="row">
          <div class="col-sm-12 f22">

            <p>&nbsp;</p>
            <p class="f2 f12">&nbsp;<span class="f3 glyphicon glyphicon-home"></span> Endereço de entrega</p>

            <p>&nbsp;</p>
            
            <form class="form-inline" action="/action_page.php">
              <div class="form-group">
                <input type="text" name="endereco" class="endereco" size=50 value="<?php echo $usuario->getEndereco().", ".$usuario->getNumero();?>">
              </div>
            </form>

            <p>&nbsp;</p>
            
            <p><a href="VoltarEndereco" class="f2 f13">Quero trocar meu endereço</a></p>

            <p>&nbsp;</p>           
            
          </div>
        </div>

        <p>&nbsp;</p>

<!--------------------------------------------------------------->
        
        <!--Linha 3-->
        <div class="row">
          <div class="col-sm-12 f22">

            <p>&nbsp;</p>
            <p class="f2 f12">&nbsp;<span class="f3 glyphicon glyphicon-usd"></span> Informações de pagamento</p>

            <hr>

            <form class="form-inline" action="/action_page.php">
              <p><div class="form-group">
                <label class="f8" for="cpf">CPF: </label>
                <input type="text" id="cpf" class="geral" size=11 value="<?php echo $cartao->getCpf();?>" readonly>
              </div></p>

              <p><div class="form-group">
                <label class="f8" for="cartao">Número do Cartão: </label>
                <input type="text" id="cartao" class="geral" size=16 value="<?php echo $cartao->getNumeroCartao();?>" readonly>
              </div></p>

              <p><div class="form-group">
                <label class="f8" for="bandeira">Bandeira: </label>
                <input type="text" id="bandeira" class="geral" size=13 value="<?php echo $cartao->getBandeira();?>" readonly>
              </div></p>

              <p><div class="form-group">
                <label class="f8" for="mes">Validade: </label>
                <input type="text" id="mes" class="pequeno" size=1 value="<?php echo $cartao->getMesValidade();?>" readonly>
                <span class="f8" for="ano">de </span>
                <input type="text" id="ano" class="geral" size=1 value="<?php echo $cartao->getAnoValidade();?>" readonly>
              </div></p>

              <p><div class="form-group">
                <label class="f8" for="cvv">Código de Verificação (CVV): </label>
                <input type="text" id="cvv" class="geral" size=1 value="<?php echo $cartao->getCvv();?>" readonly>
              </p></div>
            </form>

            <p>&nbsp;</p>
            
            <p><a href="VoltarPagamento" class="f2 f13">Quero alterar meus dados</a></p>

            <p>&nbsp;</p>
            
          </div>
        </div>

        <p>&nbsp;</p>

<!--------------------------------------------------------------->
        
        <!--Linha 4-->
        <div class="row">
          <div class="col-sm-12 f22">

            <p>&nbsp;</p>
            <p class="f2 f12">&nbsp;<span class="f3 glyphicon glyphicon-list-alt"></span> Detalhes do envio</p>

            <hr>

            <form class="form-inline" action="/action_page.php">
              <p class="f8"><div class="form-group">
                <label class="f8" for="tempo">Entrega estimada em: </label>
                <input type="text" id="tempo" class="pequeno" size=1 value="125" required>
                <span class="f8">minutos.</span>
              </div></p>
            </form>

            <p>&nbsp;</p>
            
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
                      <p class="f13"><?php echo $item->getProduto()->getNome(); ?></p>
                    </div>
                    
                  </div>
                  <p>&nbsp;</p>
                </td>
                
                <td align="center">
                  <p>&nbsp;</p>
                  <p class="f8 f23">Quantidade</p>
                  <p class="f13 f23 f26"><?php echo $item->getQuantidade(); ?> unidades </p>
                  <p>&nbsp;</p>
                </td>
                
              </tr>
              
              <?php }} ?>

              <!--Apenas para gerar a linha de borda-->
              <tr class="f27"></tr>
            </table>

            <p>&nbsp;</p>
            
            <p><a href="Carrinho" class="f2 f13">Quero voltar ao carrinho </a></p>

            <p>&nbsp;</p>        
            
          </div>
        </div>
        
      </div>
      
      <div class="col-sm-2"></div>
      
    </div>
  </div>

  <p>&nbsp;</p><p>&nbsp;</p>
  
<!--------------------------------------------------------------->
  
  <div class="container">
    <div class="row">
      
      <div class="col-sm-5"></div>
      
      <div class="col-sm-2 text-center">
        <form action="CriarPedido" method="post">
          <div class="form-group">
            <input type="hidden" name="idusuario" value="<?php echo $usuario->getIdUsuario();?>">
            <button type="submit" class="btn btn-default">Confirmar pedido</button>
          </div> 
        </form>
      </div>

      <div class="col-sm-5"></div>
      
    </div>
  </div>  

<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
