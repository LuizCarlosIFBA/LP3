<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mercadão 2.0</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="view/style.css" rel="stylesheet" type="text/css" />

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
    </script>
  <script src="view/script.js"></script>

</head>

<body>

  <div class="container">
    <div>
      <h1 class="my-4">Carrinho de compras</h1>
    </div>
  </div>


  <section style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">

              <div class="row">

                <div class="col-lg-7">
                  <h5 class="mb-3"><a href="./index.php" class="text-body"><i
                        class="fas fa-long-arrow-alt-left me-2"></i>Continue comprando </a></h5>
                  <hr>

                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                    </div>
                    <div>
                      <p class="mb-0"><span class="text-muted"> Itens:
                          <?php echo count($itensCarrinho); ?>
                        </span> </p>
                    </div>
                  </div>

                  <?php foreach ($itensCarrinho as $item): ?>
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <div class="d-flex flex-row align-items-center">
                            <div>
                              <img src=<?php echo 'view/images/products/' . $item->getProduto()->getImagem(); ?>
                                class="img-fluid rounded-3" alt="produto" style="width: 65px;">
                            </div>
                            <div class="ms-3">
                              <h5>
                                <?php echo $item->getProduto()->getNome(); ?>
                              </h5>
                              <p class="small mb-0">
                                <?php echo $item->getProduto()->getPeso(); ?>
                              </p>
                            </div>
                          </div>
                          <div class="d-flex flex-row align-items-center">
                            <div style="width: 90px;">
                              <form action="CarrinhoAltQuant" method="post">
                                <input type="hidden" name="id" value="<?php echo $item->getProduto()->getIDProduto(); ?>">
                                <input style="width: 60%; font-size: smaller;" class="form-control me-1" type="number"
                                  name="quantidade" value="<?php echo $item->getQuantidade(); ?>" min="1">

                              </form>
                            </div>

                            <div style="width: 70px;">
                              <?php if($item->getProduto()->getDesconto() != null){ ?>
                                <strike>
                                  <p class="card-text">
                                    <?php echo number_format($item->getProduto()->getValor(), 2, ',', '.'); ?>
                                  </p>
                                </strike>
                                <p class="card-text">
                                  <?php echo number_format($item->getProduto()->getValorDesconto(), 2, ',', '.'); ?>
                                </p>
                              <?php }else
                                echo "<p class='card-text'>" . number_format((float)$item->getProduto()->getValor(), 2, ',', '') . "</p>";
                              ?>
                            </div>

                            <div style="width: 45px;">
                              <form action="ApagaItemCarrinho" method="post">
                                <input type="hidden" name="id" value="<?php echo $item->getProduto()->getIDProduto(); ?>">
                                <button type="submit" class="btn-close" aria-label="Close"></button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>


                </div>
                <div class="col-lg-5">

                  <div class="card bg-danger text-white rounded-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Cartão</h5>

                      </div>

                      <p class="small mb-2">Bandeiras aceitas </p>
                      <div class="col">

                        <img src="view/images/bandeirascartao/bandeiras.png" style="width: 100%">
                      </div>

                      <form action="finalizarcompra" method="post" name="formCarrinho" id="formCarrinho" class="mt-4">
                        <div class="form-outline form-white mb-4">
                          <h5 class="card-title">Nome </h5>
                          <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                            placeholder="Nome impresso no cartão" required />
                        </div>

                        <div class="form-outline form-white mb-4">
                          <h5 class="card-title">Numero do cartão </h5>
                          <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
                            placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" required />
                        </div>

                        <div class="row mb-4">
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/AAAA"
                                size="7" id="exp" minlength="7" maxlength="7" required />
                              <label class="form-label" for="typeExp">Validade </label>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-outline form-white">
                              <input type="password" id="typeText" class="form-control form-control-lg"
                                placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" required />
                              <label class="form-label" for="typeText">Numero de segurança </label>
                            </div>
                          </div>

                        </div>
                        <div class="form-outline form-white mb-4">
                          <h5 class="card-title"> Endereço </h5>
                          <p>As compras devem ser enviadas para seu endereço padrão?</p>
                          <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck" value="yes"
                            checked>
                          <label for="noCheck" class="form-label">Sim</label>
                          <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck" value="no">
                          <label for="yesCheck" class="form-label">Não</label>
                          <br>
                          <!-- <div id="ifNo" style="visibility:hidden"> -->
                          <div>
                            <label class="form-label" for="cep">Caso não, insira o endereço para o qual a compra deve ser enviada:
                            </label>
                            <input class="form-control" type="text" id="cep" name="cep" placeholder="00.000-000" disabled minlength="8" maxlength="8">
                            <input class="form-control mt-1" type='text' id='endereco' name='endereco' placeholder="Endereço" disabled>
                            <div class="doubleLine2 mt-1">
                              <input class="form-control" id="numero" type="text" name="numero" placeholder="Número" disabled minlength="1" maxlength="3">
                              <input class="form-control" id="complemento" type="text" name="complemento" placeholder="Complemento" disabled>
                            </div>
                          </div>
                        </div>


                        <hr class="my-4">

                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Subtotal: </p>
                          <p class="mb-2">
                            <?php
                            echo "R$ " . number_format($carrinho->getSubTotal(), 2, ',', '.');
                            ?>
                          </p>
                        </div>

                        <div class="d-flex justify-content-between">
                          <p class="mb-2">Subtotal com descontos: </p>
                          <p class="mb-2">
                            <?php
                            echo "R$ " . number_format($carrinho->getTotal(), 2, ',', '.');
                            ?>
                          </p>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                          <p class="mb-2">Total</p>
                          <p class="mb-2">R$
                            <?php
                            echo (number_format($carrinho->getTotal(), 2, ',', '.'));
                            ?>
                          </p>
                        </div>
                        <input type="submit" class="btn btn-light" value="Fechar pedido">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>