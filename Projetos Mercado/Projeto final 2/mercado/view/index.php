<!DOCTYPE html>
<html lang="pt-BR">

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

<body>

  <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="view/images/carousel/btv05-verao.avif" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="view/images/carousel/btv05-pascoa.avif" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="view/images/carousel/btv-entrega-flash.gif" class="d-block w-100 " alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  
  <div class="container margin-top-bot">
    <div>
      <h1 class="my-4">Produtos em oferta</h1>
    </div>
    
    <div class="row">
      <?php
        require_once "controller/ControleProduto.php";
        $arrayProduto = ControleProduto::listaProduto(1, 0);
        
        foreach ($arrayProduto as $produto)
        {
          echo "<div class='card col-sm-3 border-0'>";
          echo "  <img src='view/images/svg/discount.svg' class='position-absolute top-5 start-5' width='50' height='50'>";
          echo "  <form class='' name='formProduto' method='post' action='produto'>";
          echo "    <input type='hidden' name='IDProduto' value='". $produto->getIDProduto() . "'>";
          echo "      <button class='btn border-0 btn-primary-outline' type='action'><img src='view/images/products/" . $produto->getImagem() . "' class='card-img-top' alt='...'></button>";
          echo "    <div class='card-body'>";
          echo "      <h5 class='card-title ellipsis'>". $produto->getNome() ."</h5>";
          echo "      <strike>";
          echo "        <p class='card-text'>R$ " . number_format((float)$produto->getValor(), 2, ',', '') . "</p>";
          echo "      </strike>";
          echo "      <p class='card-text'>R$ " . number_format((float)$produto->getValorDesconto(), 2, ',', '') . "</p>";
          echo "      <div class='d-grid gap-2'>";
          echo "        <input type='submit' class='btproduto w-100' value='Comprar'>";
          echo "      </div>";
          echo "    </div>";
          echo "  </form>";
          echo "</div>";
        }
      ?>
    </div>
  </div>

  <script src="view/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
    
</body>

</html>