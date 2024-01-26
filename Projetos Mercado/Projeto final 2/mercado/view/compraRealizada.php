<body>

  <?php
  if (isset($pedido) && $pedido->getIDPedido() != 0)
    echo "<h1>Compra realizada com sucesso!</h1>";
  else
    echo "<h1>Ocorreu um erro com sua compra!</h1>"
  ?>


  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>