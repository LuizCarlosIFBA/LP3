<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cadastro de Clientes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<!-- formulario de cadastro-->
<div class="container"></div>
  <h2>Cadastro do Livros</h2>
  <form name="cadLivro" method = "post" action="ProcessaCadLivro.php">
    <div class="form-group">
      <label for="nome">Nome do Livro':</label>
      <input type="text" class="form-control" id="nome" placeholder="Informe o nome do livro" name="nome" required>
    </div>
    <div class="form-group">
        <label for="edicao">Edição:</label>
        <input type="text" class="form-control" id="edicao" placeholder="Informe a edição" name="edicao" required>
      </div>
    <div class="form-group">
        <label for="ano">Ano:</label>
        <input type="ano" class="form-control" id="ano" placeholder="Informe o ao de publicacao" name="ano" required>
      </div>
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
</div>
</body>
</html>