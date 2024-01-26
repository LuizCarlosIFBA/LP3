<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mercadão 2.0</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="view/style.css" rel="stylesheet" type="text/css" />

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
    </script>
</head>
<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand" href="index">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-bag-dash me-2" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
          <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
        </svg>
        Mercado
      </a>
      <!--<img src="https://d21wiczbqxib04.cloudfront.net/0AMj7ExJt3rsKRfF3LsejZ0mWXA=/370x0/smart/https://s3-sa-east-1.amazonaws.com/osuper-vitrine-carol/logo.png" style="max-width: 150px;"/>-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <div class="left-align align-middle mt-auto mb-auto">
            <li class="nav-item">
              <a class="nav-link" href="index">Ofertas</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorias
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="bebidas">Bebidas</a></li>
                <li><a class="dropdown-item" href="mercearia">Mercearia</a></li>
                <li><a class="dropdown-item" href="produtos-de-limpeza">Produtos de Limpeza</a></li>
                <li><a class="dropdown-item" href="higiene-pessoal-e-perfumaria">Higiene Pessoal e Perfumaria</a></li>
                <li><a class="dropdown-item" href="frios-e-laticínios">Frios e Laticínios</a></li>
                <li><a class="dropdown-item" href="carnes-aves-e-peixes">Carnes, Aves e Peixes</a></li>
                <li><a class="dropdown-item" href="congelados">Congelados</a></li>
                <li><a class="dropdown-item" href="hortifruti">Hortifruti</a></li>
              </ul>
            </li>
          </div>
          
          <div class="right-align align-middle mt-auto mb-auto">
            <?php
              if(isset($_SESSION["idusuario"]) && isset($_SESSION["nomeusuario"]))
              {
                if(isset($_SESSION["idfuncionario"]) && isset($_SESSION["idcargo"]))
                {
                  echo "<li class='nav-item align-middle mt-auto mb-auto'>";
                  echo "  <a class='nav-link' href='paginaFuncionario'>Aréa do funcionário</a>";
                  echo "</li>";
                }else{
                  echo "<li class='nav-item align-middle mt-auto mb-auto'>";
                  echo "  <a class='nav-link' href='visualizar'>Meus pedidos</a>";
                  echo "</li>";
                  
                  echo "<li class='nav-item align-middle mt-auto mb-auto'>";
                  echo "  <a class='nav-link' href='carrinho'>Carrinho</a>";
                  echo "</li>";
                }

                

                echo "<li class='nav-item dropdown'>";
                echo "  <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>";
                echo "    Olá, ".$_SESSION["nomeusuario"];
                echo "  </a>";
                echo "  <ul class='dropdown-menu'>";
                if(!isset($_SESSION["idfuncionario"])){
                  echo "    <li class='dropdown-item'>";
                  echo "      <a class='nav-link' href='perfil'>Perfil</a>";
                  echo "    </li>";
                }
                echo "    <li class='dropdown-item'>";
                echo "      <form method='post' class='m-auto' action ='index'>";
                echo "        <input class='nav-link' type='submit' name='logout' value='Logout'/>";
                echo "      </form>";
                echo "    </li>";  
                echo "  </ul>";
                echo "</li>";
              }
              else
              {
                echo "<li class='nav-item align-middle mt-auto mb-auto'>";
                echo "  <a class='nav-link' href='login'>Login</a>";
                echo "</li>";
              }
            ?>
            
          </div>
        </ul>

      </div>
    </div>
  </nav>