<?php
  require_once "Model/BO/Cartao.php";

  $logado = false;
  $alterando = false;
  if(isset($_SESSION["usuario"])){
    $logado = true;
    $usuario = new Usuario();
    $usuario = unserialize($_SESSION["usuario"]);
  }
  else {
    $_SESSION["identificar"] = true;
    header("Location: Login");
    exit();
  }
  if(isset($_SESSION["cartao"])){
    $cartao = new Cartao();
    $cartao = unserialize($_SESSION["cartao"]);
  }
  if(isset($_SESSION["cartaoCadastrado"]) && !isset($_SESSION["voltar"])){
    header("Location: Confirmacao");
    exit();
  }
  else if(isset($_SESSION["voltar"])){
    unset($_SESSION["voltar"]);
    $alterando = true;
  }
?>

<?php $tituloPagina = "Pagamento";
require_once "Cabecalho.php";?>
  <style>
    /*Colunas de tabelas*/
    table.table > tbody > tr > td{
      border-top: 0px;
      border-bottom: 0;
    }
    input, select {
      margin-bottom: 10px;
      margin-right: 41px;
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
      transform: rotate(108deg);
    }
    /*Regras de começo e fim*/
    @keyframes fill{
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(108deg);
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

                  <div class="inside-circle"> 60% </div>
      
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
              <span class="active glyphicon glyphicon-credit-card f2 f10 f20"></span>
              <p class="f2 f13">Pagamento</p>
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

<?php if ($alterando) {?>
  <div class="container text-left">
    <div class="row">
    
      <div class="col-sm-3"></div>

      <div class="col-sm-6">
        <div class="alert alert-info">
          <p><strong>AVISO:</strong> Informe novamente os seus dados.</p>
        </div>
      </div>

      <div class="col-sm-3"></div>
    </div>
  </div>    
<?php }?>

<div class="container text-left">
  <div class="row">
    
    <div class="col-sm-3"></div>

    <div class="col-sm-6 f22">
      <p>&nbsp;</p>
      <p class="f2 f12">&nbsp;<span class="f3 glyphicon glyphicon-credit-card"></span> Pagamento</p>
      <p>&nbsp;</p>

      <hr>

      <?php if ($alterando) {?>
      <form class="form-inline" action="AlterarDadosCartao" method="post">
      <?php } else {?>
      <form class="form-inline" action="CadastrarCartao" method="post">
      <?php }?>

        <div class="form-group">
          <input type="text" name="nome" class="form-control" size=71  placeholder="Nome" required>
        </div>
        
        <div class="form-group">
          <input type="text" name="cartao" class="form-control" size=71 placeholder="Número do Cartão de Crédito" required>
        </div>
        
        <div class="form-group">
          <select class="form-control" name="bandeira" required>
            <option value="" disabled selected>Bandeira</option>
            <option value="MasterCard">MasterCard</option>
            <option value="Visa">Visa</option>
            <option value="Elo">Elo</option>
            <option value="American Express">American Express</option>
            <option value="Hipercard">Hipercard</option>
          </select>
          
          <select class="form-control" name="mes" required>
            <option value="" disabled selected>Mês de validade</option>
            <option value="01">Janeiro</option>
            <option value="02">Fevereiro</option>
            <option value="03">Março</option>
            <option value="04">Abril</option>
            <option value="05">Maio</option>
            <option value="06">Junho</option>
            <option value="07">Julho</option>
            <option value="08">Agosto</option>
            <option value="09">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
          </select>
          
          <select class="form-control" name="ano" required>
            <option value="" disabled selected>Ano de Validade</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
            <option value="2031">2031</option>
            <option value="2032">2032</option>
            <option value="2033">2033</option>
            <option value="2034">2034</option>
            <option value="2035">2035</option>
            <option value="2036">2036</option>
            <option value="2037">2037</option>
            <option value="2038">2038</option>
          </select>
          
          <input type="text" name="cvv" class="form-control" size=71 placeholder="Código de Verificação (CVV)" required>
        </div>
        
        <div class="form-group">
          <input type="text" name="cpf" class="form-control" size=71  placeholder="CPF" required>
        </div>

        <p>&nbsp;</p>

        <?php if ($alterando) {?> 
          <div class="form-group">
            <input type="hidden" name="idcartao" value="<?php echo $cartao->getIdCartao();?>">
            <button type="submit" class="btn btn-default">Alterar</button>
          </div>
        <?php } else {?>
          <div class="form-group">
            <input type="hidden" name="idusuario" value="<?php echo $usuario->getIdUsuario();?>">
            <button type="submit" class="btn btn-default">Prosseguir</button>
          </div>
        <?php } ?>
        
      </form>

      <p>&nbsp;</p>
      
    </div>
    
    <div class="col-sm-3"></div>
    
  </div>
</div>

<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
