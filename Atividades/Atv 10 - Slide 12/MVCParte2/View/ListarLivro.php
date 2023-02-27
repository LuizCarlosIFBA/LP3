<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<div class="container">
  <h2>Listar Livros</h2>
  <a href="View/CadLivro.php" class="btn btn-primary">Novo Livro</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>código</th>
        <th>Título</th>
      </tr>
    </thead>
    <tbody>
      <?php for($i=0;$i<count($listaLivros);$i++){ ?>
           <tr>
           <td><?php echo $listaLivros[$i]->getCodigo(); ?></td>
           <td><?php echo $listaLivros[$i]->getTitulo(); ?></td>
           </tr>   
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>