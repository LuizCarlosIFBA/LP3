<?php
  require_once "Model/BO/Produto.php";
  
  $logado = false;
  if(isset($_SESSION["usuario"])){
    $logado = true;
    $usuario = new Usuario();
    $usuario = unserialize($_SESSION["usuario"]);
  }
  $listaProdutos = array();
  if(isset($_SESSION["listaprodutos"])){
    $listaProdutos = unserialize($_SESSION["listaprodutos"]);
  }
  else {
    header("Location: Home");
    exit();
  }
?>

<?php $tituloPagina = "ListaProdutos";
require_once "Cabecalho.php";?>
  <style>
    /*Bordas da tabela*/
    table.table {
      margin-top:20px;
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

  <p>&nbsp;</p><p>&nbsp;</p>
  
  <div class="container">
    <div class="row">

      <!--Formulário de categorias-->
      <div class="col-sm-3 f22 text-left">

        <!--Categorias-->
        <p>&nbsp;</p>
        <p class="f2 f12">&nbsp;<i class="f3 fa-solid fa-book"></i> Categorias</p>

        <hr>

        <p class="f8 f13 f24">Mostre produtos do tipo:</p>
      
        <form action="filtrarCategoria">
          <div class="checkbox f8 f24">
          
            <p class="f29">
              <label><input type="checkbox" value=1 name="idcategoria" disabled>Eletroportáteis</label>
            </p>
            <p class="f29">
              <label><input type="checkbox" value=2 name="idcategoria" disabled>Bebidas</label>
            </p>
            <p class="f29">
              <label><input type="checkbox" value=3 name="idcategoria" disabled>Mercearia</label>
            </p>
            <p class="f29">
              <label><input type="checkbox" value=4 name="idcategoria" disabled>Produtos de Limpeza</label>
            </p>
            <p class="f29">
              <label><input type="checkbox" value=5 name="idcategoria" disabled>Higiene Pessoal e Perfumaria</label>
            </p>
          </div>
        </form>

        <p>&nbsp;</p>
      
      </div>

<!--------------------------------------------------------------->
      <div class="col-sm-1"></div>
    
      <div class="col-sm-7">

        <div class="row">
          <div class="col-sm-12 f22">

            <p>&nbsp;</p>

            <p class="f2 f12">&nbsp;<i class="f3 fa-solid fa-jar"></i> Produtos</p>

            <!--Tabela de produtos-->
            <table class = "table table-hover"> 

              <!--Head-->
                <tr class="f27">          
                  <th>
                    <p class="f8 f20 f26 text-center">Produto</p>
                  </th>
                  <!--Espaçamento-->
                  <th>
                    <p>&nbsp;</p>
                  </th>          
                  <th>
                    <p class="f8 f20 f26 text-center">Preço</p>
                  </th>
                  <!--Espaçamento-->
                  <th>
                    <p>&nbsp;</p>
                  </th>            
                  <th>
                    <p>&nbsp;</p>
                  </th>
                  <th>
                    <p class="f8 f20 f26 text-center">Ação</p>
                  </th>            
                </tr>

              <?php for($i=0;$i<count($listaProdutos);$i++){ ?>

                <!--Produto-->
                <tr>
          
                  <td>  
                    <p>&nbsp;</p>
                    <div class="media">

                      <!--Imagem do produto-->
                      <div class="media-left">
                        <img src="View/Imagens/<?php echo $listaProdutos[$i]->getNomeImagem();?>" class="media-object imagem5">
                      </div>

                      <!--Descrição-->
                      <div class="media-body">
                        <p class="media-heading f8"><?php echo $listaProdutos[$i]->getMarca(); ?></p>
                        <p class="f13"><?php echo $listaProdutos[$i]->getNome(); ?></p>
                      </div>
                    
                    </div>
                    <p>&nbsp;</p>
                  </td>

                  <!--Espaçamento-->
                  <td>
                    <p>&nbsp;</p>
                  </td>

                  <td>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p class="f2 f13 f26 text-center"><?php echo $listaProdutos[$i]->getPreco(); ?></p>
                  </td>

                  <!--Espaçamento-->
                  <td>
                    <p>&nbsp;</p>
                  </td>
                  <td>
                    <p>&nbsp;</p>
                  </td>
          
                  <td>
                    <p>&nbsp;</p>
                    <form action="PesquisarProduto" method="post">
                      <div class="form-group f30c text-center">
                        <input type="hidden" name="idproduto" value="<?php echo $listaProdutos[$i]->getIdProduto(); ?>">
                        <button type="submit" class="btn btn-info lista text-center"><span class="glyphicon glyphicon-search"></span> Visualizar</button>
                      </div>
                    </form>
                  </td>
          
              </tr>

              <?php } ?>

            </table>
          
          </div>
        </div>

<!--------------------------------------------------------------->
        <div class="row"> 
          <div class= "col-sm-12 text-center">
            <!--Paginação-->
            <ul class="pagination">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">...</a></li>
              <li><a href="#">57</a></li>
            </ul>
          </div>
        </div>
      
      </div>
    </div>
  </div>

<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
