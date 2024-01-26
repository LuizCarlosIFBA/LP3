<?php
  require_once "Model/BO/Produto.php";

  $logado = false;
  if(isset($_SESSION["usuario"])){
    $logado = true;
    $usuario = new Usuario();
    $usuario = unserialize($_SESSION["usuario"]);
  }
  if(isset($_SESSION["produto"])){
    $produto = new Produto();
    $produto = unserialize($_SESSION["produto"]); 
  }
  else {
    header("Location: Home");
    exit();
  }
  if(isset($_SESSION["categoria"])){
    $categoria = new Categoria();
    $categoria = unserialize($_SESSION["categoria"]);
  }
  if(isset($_SESSION["relacionados"])){
    $relacionados = array();
    $relacionados = unserialize($_SESSION["relacionados"]);
  }
?>

<?php $tituloPagina = "Produto";
require_once "Cabecalho.php";?>
  <style>   
    /*Bordas da tabela*/
    table.table {
      border:1px solid #E6E6E6;
    }
    /*Linhas da tabela*/
    table.table > tbody > tr > td {
      border:1px solid #E6E6E6;
    } 
  </style> 
</head>

<!--------------------------------------------------------------->

<body>
  <!--Barra de navegação-->
  <nav class="navbar"> 
    <div class="container-fluid">

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

  <div class="container text-left">
    <div class="row">
      <div class="col-sm-12">
        <p class="f7"><b>Você está em: </b><?php echo $categoria->getNome();?> > <b>Código: </b><?php echo $produto->getIdProduto();?></p>
      </div>
    </div> 
  </div>

  <!--------------------------------------------------------------->

  <hr>

  <p>&nbsp;</p><p>&nbsp;</p>
  
  <div class="container">
    <div class="row">
    
      <div class="col-sm-1"></div>
    
      <div class="col-sm-10 f18b f22">

        <p class="f7b f8 f12b f13 f23b"><?php echo $produto->getNome()." - ". $produto->getMarca();?></p>

        <hr>

        <!--Imagem do produto-->
        <div class="media">
          <div class="media-left">
            <img src="View/Imagens/<?php echo $produto->getNomeImagem();?>" class="media-object imagem3">
          </div>

          <!--Conteúdo ao lado-->
          <div class="media-body">
            <div class="f7b f8 f16 f23b">
            
              <table>
              <form action="/action_page.php" method="post">
                <div class="form-group">
                
                  <p>Estoque atual:
                  <input class="estoque" type="text" name="estoque" value="<?php echo $produto->getEstoque();?>" size=1 readonly> unidades</p>
                
                </div>
              </form>
            
              <p>&nbsp;</p>
            
              <p><s class="f24"> R$16,99</s></p>
              <p class="f3 f13"> R$<?php echo number_format($produto->getPreco(), 2, ',', '.');?></p>
            </div>

            <br>

            <form action="AdicionarCarrinho" method="post">
              <div class="form-group">
                <input type="hidden" name="idproduto" value="<?php echo $produto->getIdProduto();?>">
                <button type="submit" class="btn btn-info produto"><span class="glyphicon glyphicon-shopping-cart"></span> Adicionar ao carrinho</button>
              </div>
            </form>
            </table>
          </div>
        </div>  
      </div>
    
      <div class="col-sm-1"></div>
    
    </div>
  </div>

  <p>&nbsp;</p><p>&nbsp;</p>

  <hr>

  <!--------------------------------------------------------------->

  <p>&nbsp;</p>
  
  <div class="container-fluid text-center">
    <div class="row">

      <div class="col-sm-1"></div>
  
      <div class="col-sm-10">
        <table class="table">
          <tbody>

            <tr>
              <p class="f2 f12 f13">Outros Produtos</p>
            </tr>

            <tr>
              <br>
            </tr>

            <tr class="f22">
          
              <!--Produto 1-->
              <td>
                <a href="Produto"><img src="View/Imagens/<?php echo $relacionados[0]->getNomeImagem();?>" class="imagem4"></a>
                <p class="gray f7 f15"> <?php echo $relacionados[0]->getNome()." - ". $relacionados[0]->getMarca();?></p>

                <hr>         
                
                <p class="f3 f13 f15">R$<?php echo number_format($relacionados[0]->getPreco(), 2, ',', '.');?></p>

                <hr> 
              
                <form action="PesquisarProduto" method="post">
                  <div class="form-group">
                    <input type="hidden" name="idproduto" value="<?php echo $relacionados[0]->getIdProduto();?>">
                    <button type="submit" class="btn btn-info visualizar"><span class="glyphicon glyphicon-search"></span> Visualizar</button>
                  </div>
                </form>
              </td>
          
              <!--Produto 2-->
              <td>
                <a href="Produto"><img src="View/Imagens/<?php echo $relacionados[1]->getNomeImagem();?>" class="imagem4"></a>
                <p class="gray f7 f15"><?php echo $relacionados[1]->getNome()." - ". $relacionados[1]->getMarca();?></p>

                <hr>
                
                <p class="f3 f13 f15">R$<?php echo number_format($relacionados[1]->getPreco(), 2, ',', '.');?></p>

                <hr> 

                <form action="PesquisarProduto" method="post">
                  <div class="form-group">
                    <input type="hidden" name="idproduto" value="<?php echo $relacionados[1]->getIdProduto();?>">
                    <button type="submit" class="btn btn-info visualizar"><span class="glyphicon glyphicon-search"></span> Visualizar</button>
                  </div>
                </form>
              </td>
          
              <!--Produto 3-->
              <td>
                <a href="Produto"><img src="View/Imagens/<?php echo $relacionados[2]->getNomeImagem();?>" class="imagem4"></a>

                <p class="gray f7 f15"><?php echo $relacionados[2]->getNome()." - ". $relacionados[2]->getMarca();?></p>

                <hr>
                
                <p class="f3 f13 f15">R$<?php echo number_format($relacionados[2]->getPreco(), 2, ',', '.');?></p>

                <hr> 
              
                <form action="PesquisarProduto" method="post">
                  <div class="form-group">
                    <input type="hidden" name="idproduto" value="<?php echo $relacionados[2]->getIdProduto();?>">
                    <button type="submit" class="btn btn-info visualizar"><span class="glyphicon glyphicon-search"></span> Visualizar</button>
                  </div>
                </form>
              </td>
          
              <!--Produto 4-->
              <td>
                <a href="Produto"><img src="View/Imagens/<?php echo $relacionados[3]->getNomeImagem();?>" class="imagem4"></a>

                <p class="gray f7 f15"><?php echo $relacionados[3]->getNome()." - ". $relacionados[3]->getMarca();?></p>

                <hr>
                
                <p class="f3 f13 f15">R$<?php echo number_format($relacionados[3]->getPreco(), 2, ',', '.');?></p>

                <hr> 
              
                <form action="PesquisarProduto" method="post">
                  <div class="form-group">
                    <input type="hidden" name="idproduto" value="<?php echo $relacionados[3]->getIdProduto();?>">
                    <button type="submit" class="btn btn-info visualizar"><span class="glyphicon glyphicon-search"></span> Visualizar</button>
                  </div>
                </form>
              </td>
          
            </tr>
          </tbody>
        </table>
      </div>

      <div class="col-sm-1"></div>
  
    </div> 
  </div>

<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
