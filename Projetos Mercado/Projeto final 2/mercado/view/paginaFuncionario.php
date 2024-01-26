<body>
  <div class="container margin-top-bot">
    <div>
      <h1 class="mb-4 mt-0">Perfil do funcionário</h1>
    </div>
    <div class="row">
      <div class="col-6">
        <h4 class="my-3">Meus dados</h4>
        <p>Nome:
          <?php echo $funcionario->getNome(); ?>
        </p>
        </p>
        <p>E-mail:
          <?php echo $funcionario->getEmail(); ?>
        </p>
      </div>
    </div>
  </div>

  <h1 class="text-center">Setor de
    <?php echo $funcionario->getCargo(); ?>
  </h1>

  <div class="container mb-4">
    <div class="row">
      <div class="col-6">
        <h2 class="my-4">Pedidos pendentes</h2>
        <?php
        require_once "model/ProcessamentopedidoDAO.php";
        $arrayPedido = ProcessamentopedidoDAO::getListaDemandas();

        foreach ($arrayPedido as $pedido) { ?>
          <div>
            <form name='formPegarDemanda' method='post' action='pegardemanda'>
              <input type='hidden' name='idpedido' value='<?php echo $pedido->getIDPedido(); ?>'>
              <div class='card'>
                <div class='row g-0'>
                  <div class='col-sm-6 p-3'>
                    <h5 class='card-title'>Número do pedido:</h5>
                    <p>
                      <?php echo $pedido->getIDPedido(); ?>
                    </p>
                  </div>
                  <div class='col-sm-6 p-3'>
                  <button type="submit" class='btn btn-primary w-100 my-1 btn-sm' type='button'>Pegar Demanda</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        <?php } ?>
      </div>
      <div class="col-6">
        <h2 class="my-4">Demanda atual</h2>
        <div class='card'>
          <?php if ($pedidoAtual->getIdpedido() != 0) { ?>
            <form class='m-3' name='formDemanda' method='post' action='finalizardemanda'>
              <input type='hidden' name='IDPedido' value=<?php echo $pedidoAtual->getIDPedido() ?>>
              <input type='hidden' name='idfuncionario' value=<?php echo $funcionario->getIDFuncionario() ?>>
              <div>
                <?php echo "<h1>Pedido #" . $pedidoAtual->getIDPedido() . "</h1>" ?>
              </div>

              <table class="table my-4">
                <thead>
                  <tr>
                    <th scope="col" class="col-9">Produto</th>
                    <th scope="col" class="col-3">Quantidade</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once "model/pedidoDAO.php";
                  $arrayItensPedido = PedidoDAO::getListaItensDoPedido($pedidoAtual);
                  foreach ($arrayItensPedido as $item) {
                    ?>
                    <tr>
                      <td>
                        <?php echo $item->getNome(); ?>
                      </td>
                      <td>
                        <?php echo $item->getQuantidade(); ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

              <div class="d-flex">
                <!-- TODO: PRECISA ADICIONAR UM CONDICIONAL PARA SE FOR A PRIMEIRA ETAPA, ELE NAO CONSEGUIR RETROCEDER -->
                <?php
                  if($_SESSION["idcargo"] == 2)
                    echo "<button type='submit' class='btn btn-primary flex-fill m-3' name='opcao' value='retornar'>Retornar à etapa anterior</button>";
                ?>
                

                <button type="submit" class="btn btn-primary flex-fill m-3" name="opcao" value="finalizar">Próxima
                  etapa</button>
              </div>

            </form>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>


  <script src="view/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>