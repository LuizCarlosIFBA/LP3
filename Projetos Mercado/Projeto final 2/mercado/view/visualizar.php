<!DOCTYPE html>
<html>

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

<!-- ------------------------ MODAIS ------------------------

  <div class="modal" id="detalhesModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detalhes do pedido</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          <h3>Pedido #0000000</h3>
          
          <table class="table my-4">
            <thead>
              <tr>
                <th scope="col" class="col-9">Produto</th>
                <th scope="col" class="col-3">Quantidade</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Café</td>
                <td>3</td>
              </tr>
              <tr>
                <td>Açucar</td>
                <td>2</td>
              </tr>
              <tr>
                <td>Pão</td>
                <td>12</td>
              </tr>
            </tbody>
          </table>

          <p>Status: Em processamento</p>
          <p>Data da compra: 00/00/0000</p>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="rastrearModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Histórico do pedido</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Setor</th>
                <th scope="col">Começo</th>
                <th scope="col">Final</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Preparação</td>
                <td>08/08/2009</td>
                <td>09/09/2010</td>
              </tr>
              <tr>
                <td>Conferência e embalagem</td>
                <td>08/08/2009</td>
                <td>09/09/2010</td>
              </tr>
              <tr>
                <td>Entrega</td>
                <td>08/08/2009</td>
                <td>09/09/2010</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="avaliarModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Avaliar compra</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="" id="formAvaliarCompra" class="mx-auto">
            <label for="qualidade" class="form-label">Avalie a compra:</label>
            <select form="formAvaliarCompra" class="form-select" id="qualidade" name="qualidade" aria-label="Avaliação da compra" required>
              <option value="ruim">Ruim</option>
              <option value="boa">Boa</option>
              <option value="otima">Ótima</option>
            </select>

            <label for="comentarios" class="form-label mt-4">Comentários:</label>
            <textarea class="form-control" id="comentarios" rows="3"></textarea>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          <button type="submit" form="formAvaliarCompra" class="btn btn-primary">Confirmar</button>
        </div>
      </div>
    </div>
  </div>



------------------------ FIM MODAIS ------------------------ -->

  <div class="container">
    <div>
      <h1 class="my-4">Seus pedidos</h1>
    </div>
  </div>

  <div class="container">
    <?php
          require_once "controller/ControlePedido.php";
          $arrayPedido = ControlePedido::listaPedido();
          
          foreach ($arrayPedido as $pedido)
          {
            echo "<div>";
            echo "<form name='formPedido' method='post' action='pedido'>";
            echo "  <input type='hidden' name='IDPedido' value='". $pedido->getIDPedido() . "'>";
            echo "  <div class='card mb-3'>";
            echo "    <div class='row g-0'>";
            echo "      <div class='col-sm-3 p-3'>";
            echo "        <h5 class='card-title'>Número do pedido:</h5>";
            echo "        <p>#". $pedido->getIDPedido() ."</p>";
            echo "      </div>";
            echo "      <div class='col-sm-2 p-3'>";
            echo "        <h6 class='card-text'>Status:</h6>";
            require_once "controller/ControleProcessamentoPedido.php";
            $ultimostatus = ControleProcessamentoPedido::getStatusPaginaPedido($pedido, 1);
            if($ultimostatus == null){
              echo "<p>Pendente</p>";
            }else{
              echo "<p>". $ultimostatus[0]->getStatus()."</p>";
            }
            echo "      </div>";
            echo "      <div class='col-sm-2 p-3'>";
            echo "        <h6 class='card-text'>Data da compra:</h6>";
            $phpdate = strtotime( $pedido->getDatacompra() );
            $mysqldate = date( 'd/m/Y', $phpdate );
            echo "        <p>". $mysqldate ."</p>";
            echo "      </div>";
            echo "      <div class='col-sm-3 p-3'>";
            echo "        <h6 class='card-text'>Valor da compra:</h6>";
            echo "        <p>R$ ". number_format((float)$pedido->getValor(), 2, ',', '') ."</p>";
            echo "      </div>";
            echo "      <div class='col-sm-2 p-3' style='display: flex; flex-direction: column; justify-content: center;'>";
            echo "        <input class='btn btn-primary w-100 my-auto btn-sm' type='submit' value='Detalhes do pedido'>";
            echo "      </div>";
            echo "    </div>";
            echo "  </div>";
            echo "</form>";
            echo "</div>";
          }
    ?>
  </div>

  <script src="view/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>