<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mercadão 2.0</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="view/style.css" rel="stylesheet" type="text/css" />

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
  </script>

  <?php
  require_once "controller/ControleProduto.php";
  $IDProduto = $_POST['IDProduto'];
  $produto = ControleProduto::processa($IDProduto);
  ?>
</head>

<body>
  <section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center h-100"> <!--- "align-items-center" removi isso pra evitar que o conteudo fique centralizado horizontalmente --->
        <div class="col">
          <div>
            <div class="card-body">

              <div class="row">
                <div class="col-lg-9">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-top">
                          <div class="w-50">
                            <?php
                            echo "<img src='view/images/products/" . $produto->getImagem() . "' class='img-fluid rounded-3' alt='produto'>";
                            ?>
                          </div>
                          <div class=" w-50 ms-3">
                            <?php
                            echo "<p class='small mb-0 text-bottom text-muted'>Cód.:" . $produto->getIDProduto() . "</p>";
                            echo "<h4 class='mb-0'> " . $produto->getNome() . " </h4>";
                            echo "<p class='small mb-0'>" . $produto->getMarca() . "</p>";
                            echo "<h5 class='mt-3'>Detalhes do produto</h5>";
                            echo "<ul class='list-group'>";
                            echo "    <li class='small list-group-item'><strong>Categoria:</strong> <span>" . $produto->getCategoria() . "</span></li> ";
                            echo "    <li class='small list-group-item'><strong>Descrição: </strong> <span>" . $produto->getDescricao() . "</span></li>";
                            echo "    <li class='small list-group-item'><strong>Tipo: </strong><span>" . $produto->getTipo() . "</span></li>";
                            echo "    <li class='small list-group-item'><strong>Embalagem: </strong> <span>" . $produto->getEmbalagem() . "</span></li>";
                            echo "    <li class='small list-group-item'><strong>Peso/Quant: </strong> <span>" . $produto->getPeso() . "</span></li>";
                            echo "</ul>";
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3">
                  <div class="card text-white rounded-3" data-bs-theme="dark">
                    <div class="card-body">

                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Valor total</h5>
                        <div class="d-flex flex-row align-items-center">
                          <div style="width: 80px;">
                            <?php
                            if ($produto->getDesconto() != 0) {
                              echo "<strike>";
                              echo "  <p class='card-text'>R$" . number_format((float)$produto->getValor(), 2, ',', '') . "</p>";
                              echo "</strike>";
                            }
                            echo "<p class='card-text'><strong>R$" . number_format((float)$produto->getValorDesconto(), 2, ',', '') . "</strong></p>";
                            ?>
                          </div>
                          <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </div>

                      <form action="additemcarrinho" method="post" id="formCompra" name="formCompra" class="mt-4">
                        <div class="d-flex justify-content-between">
                          <input style="width: 80px;" class="form-control" type="number" name="qtd" value="1" min="1" required>
                          <div class="d-flex justify-content-between">
                            <input type="hidden" name="id" value="<?php echo $produto->getIDProduto(); ?>">
                            <input type="submit" class="btn btn-light w-100" value="Comprar">
                          </div>
                        </div>
                      </form>

                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="view/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>