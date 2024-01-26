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
  require_once "controller/ControlePedido.php";
  require_once "controller/ControleProcessamentoPedido.php";
  $IDPedido = $_POST['IDPedido'];
  $pedido = ControlePedido::processa($IDPedido);

  $produtos = ControlePedido::listaProdutoquantidade($pedido);

  $ultimostatus = ControleProcessamentoPedido::getStatusPaginaPedido($pedido, 1);

  $listastatus = ControleProcessamentoPedido::getStatusPaginaPedido($pedido, 0);
  ?>
</head>

<body>
    <div class="container mt-4">
        <div>
            <?php echo "<h1 class='my-4'>Pedido #". $pedido->getIDPedido() ."</h1>"?>
        </div>

        <table class="table my-4">
            <thead>
              <tr>
                <th scope="col" class="col-6">Produto</th>
                <th scope="col" class="col-3">Quantidade</th>
                <th scope="col" class="col-3">Valor Referência</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($produtos as $produto){
                  echo "<tr>";
                  echo "  <td>". $produto->getNome() ."</td>";
                  echo "  <td>". $produto->getQuantidade() ."</td>";
                  echo "  <td>R$ ". number_format((float)$produto->getValorreferencia(), 2, ',', '') ."</td>";
                  echo "</tr>";
                }
              ?>
            </tbody>
        </table>

        <?php
          echo "<form name='formRefazerCompra' method='post' action='refazercompra'>";
          echo "  <input type='hidden' name='IDPedido' value='". $pedido->getIDPedido() . "'>";
          echo "  <input class='btn btn-primary my-1 btn-sm' type='submit' value='Colocar produtos no carrinho'></input>";
          echo "</form>";
        ?>

        <div class="infosPedido">
          <div class="leftPedido">
            <p><b>CEP:</b> <?php echo $pedido->getCep() ?></p>
            <p><b>Endereço:</b> <?php echo $pedido->getEndereco() ?></p>
            <p><b>Número:</b> <?php echo $pedido->getNumero() ?></p>
            <p class='mb-4'><b>Complemento:</b> <?php echo $pedido->getComplemento() ?></p>
          </div>

          <div>
            <p>
              <b>Status:</b> 
              <?php 
                if($ultimostatus == null){
                  echo "Pendente";
                }else{
                  echo $ultimostatus[0]->getStatus();
                }
              ?>
            </p>
            <?php 
                $phpdate = strtotime( $pedido->getDatacompra() );
                $mysqldate = date( 'd/m/Y', $phpdate );
                echo "<p><b>Data da compra:</b> ". $mysqldate ."</p>";
                echo "<p><b>Valor total:</b> R$ ". number_format((float)$pedido->getValor(), 2, ',', '') ."</p>";
            ?>
          </div>
        </div>

        <hr class="mt-5">

        <h3 class="mt-5">Histórico do pedido: </h3>

        <table class="table mb-4">
            <thead>
                <tr>
                <th scope="col" class="col-6">Setor</th>
                <th scope="col" class="col-3">Entrada</th>
                <th scope="col" class="col-3">Saída</th>
                </tr>
            </thead>
            <tbody>
              <?php
                if($ultimostatus == null){
                  echo "<tr>";
                  echo "  <td>Preparação</td>";
                  echo "  <td>-</td>";
                  echo "  <td>-</td>";
                  echo "</tr>";
                }else{
                  foreach($listastatus as $status){
                    $concluido = 0;
                    $nome;
                    if($status->getIDStatus() == 1){
                      $nome = "Preparação";
                    }else if($status->getIDStatus() == 2){
                      $nome = "Conferência e Embalagem";
                    }else if($status->getIDStatus() == 3){
                      $nome = "Entrega";
                    }else if($status->getIDStatus() == 4){
                      $concluido = 1;
                    }
                    if($concluido != 1 and !($status->getEtapaFinalizada() == 2 and $status->getIDStatus() == 2)){
                      echo "<tr>";
                      echo "  <td>". $nome ."</td>";
                      $phpdate = strtotime( $status->getDataStatus() );
                      $mysqldate = date( 'd/m/Y', $phpdate );
                      echo "  <td>". $mysqldate ."</td>";
                      if($status->getDataSaida() != null){
                        $phpdate = strtotime( $status->getDataSaida() );
                        $mysqldate = date( 'd/m/Y', $phpdate );
                        echo "  <td>". $mysqldate ."</td>";}
                      else
                        echo "  <td>-</td>";
                      echo "</tr>";
                    }
                  }
                }
              ?>
            </tbody>
        </table>

        <?php
            if($ultimostatus != null and $pedido->getAvaliacao() == null and $ultimostatus[0]->getIDStatus() == 4){
                echo "<hr class='mt-5'>";

                echo "<h3 class='mt-5'>Avaliar compra: </h3>";

                echo "<form action='avaliacao' method='post' id='formAvaliarCompra' class='mx-auto my-5'>";
                echo "    <input type='hidden' name='IDPedido' value='". $pedido->getIDPedido() . "'>";
                echo "    <label for='avaliacao' class='form-label'>Avalie a compra:</label>";
                echo "    <select form='formAvaliarCompra' class='form-select' id='avaliacao' name='avaliacao' aria-label='Avaliação da compra' required>";
                echo "    <option value='1'>Ruim</option>";
                echo "    <option value='2'>Boa</option>";
                echo "    <option value='3'>Ótima</option>";
                echo "    </select>";

                echo "    <label for='comentario_avaliacao' class='form-label mt-4'>Comentários:</label>";
                echo "    <textarea class='form-control' id='comentario_avaliacao' name='comentario_avaliacao' rows='3'></textarea>";

                echo "    <button type='submit' form='formAvaliarCompra' class='btn btn-primary mt-4'>Avaliar</button>";
                echo "</form>";
            }else if($ultimostatus != null and $pedido->getAvaliacao() != null){
              echo "<hr class='mt-5'>";
              echo "<h3 class='my-5'>Este pedido já foi avaliado. Obrigado pelo feedback!</h3>";
            }
        ?>

    </div>

  <script src="view/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>