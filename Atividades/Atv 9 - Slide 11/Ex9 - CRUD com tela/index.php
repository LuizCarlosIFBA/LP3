<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <h1>Cadastro</h1>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <form action="cadastro.php" method="post">
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="password" class="form-control" name="nome" id="nome">
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</body>

</html>
