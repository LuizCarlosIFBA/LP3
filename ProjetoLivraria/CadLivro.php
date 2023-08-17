<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Cadastro de Livro</h2>
  <form method="post" action="AdicionaLivro.php">
    <div class="form-group">
      <label for="Titulo">Titulo:</label>
      <input type="text" class="form-control" id="titulo" placeholder="Enter titulo" name="titulo">
    </div>
    <div class="form-group">
      <label for="edicao">Edição:</label>
      <input type="number" class="form-control" id="edicao" placeholder="Enter edição" name="edicao">
    </div>
    <div class="form-group">
        <label for="ano">Ano:</label>
        <input type="number" class="form-control" id="ano" placeholder="Enter ano" name="ano">
    </div>
    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="text" class="form-control" id="preco" placeholder="Enter preço" name="preco">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>