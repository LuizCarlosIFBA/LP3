<!DOCTYPE html>

<html lang=”pt-br”>

<head>
  <meta charset=”UTF-8”>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title></title>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>

  <h1>Cadastro do Cliente</h1>
  <form action="endereco.php" method="post">
    <div class="mb-3">
      <label for="CPF" class="form-label"><b>CPF:</b></label>
      <input type="text" class="form-control" name="cpf" id="cpf">
    </div>
    <div class="mb-3">
      <label for="nome" class="form-label"><b>Nome:</b></label>
      <input type="text"  class="form-control" name="nome" id="nome">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label"><b>E-mail:</b></label>
      <input type="text"  class="form-control" name="email" id="email">
    </div>
    <div class="mb-3">
      <label for="senha" class="form-label"><b>Senha:</b></label>
      <input type="password"  class="form-control" name="senha" id="senha">
    </div>

    <div class="mb-3">
      <label for="confirmarSenha" class="form-label"><b>Confirmação de senha:</b></label>
      <input type="password"  class="form-control" name="confirmarSenha" id="confirmarSenha">
    </div>

   
    <button type="submit" class="btn btn-light">Próximo</button>
  </form>

</body>

</html>