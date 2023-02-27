<!DOCTYPE HTML>
<html lang=”pt-br”>
<?php
// Start the session
session_start();
?>
<head>
  <meta charset=”UTF-8”>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title></title>
</head>

<body>
  <?php
  $cpf = $_POST['cpf'];
  $nome = $_POST['nome'];
  
  $_SESSION['cpf'] = $cpf;
  $_SESSION['nome'] = $nome;
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <h1>Cadastro do Cliente - Endereço</h1>
  <form action="cartaoCredito.php" method="post">
    <?php echo "CPF/Nome do cliente:".$_SESSION['cpf']."/".$_SESSION['nome']."";?>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label"><b>E-mail:</b></label>
      <input type="text" class="form-control" id="email">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label"><b>Complemento do endereço:</b></label>
      <input type="text" class="form-control" id="email">
    </div>

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label"><b>Bairro:</b></label>
      <select class="form-select" aria-label="Default select example">
        <option selected>Pituba</option>
        <option value="1">Cabula</option>
        <option value="2">Barra</option>
      </select>
    </div>
    <button type="submit" class="btn btn-light">Próximo</button>
  </form>

</body>

</html>