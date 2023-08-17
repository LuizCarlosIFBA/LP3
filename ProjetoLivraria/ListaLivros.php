
<?php
       require_once 'Livro.php';
       $meuLivro = new Livro("",0,0,0);
       $meuLivro->pesqTodos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lista de Livros</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Lista de Livros</h2>
        <p><a target="_blank"   href="CadLivro.php" class="btn btn-primary">Novo Livro</a></p>
        <table class="table">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Nome</th>
              <th>Edição</th>
              <th>Ano</th>
              <th>Preço</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            for ($i=0; $i<count($meuLivro->getListaLivros());$i++)
               {
           ?>
            <tr>
              <td><?php echo $meuLivro->getListaLivros()[$i]->getCodigo(); ?></td>
              <td><?php echo $meuLivro->getListaLivros()[$i]->getNome(); ?></td>
              <td><?php echo $meuLivro->getListaLivros()[$i]->getEdicao(); ?></td>
              <td><?php echo $meuLivro->getListaLivros()[$i]->getAno(); ?></td>
              <td><?php echo $meuLivro->getListaLivros()[$i]->getPreco(); ?></td>
            </tr>

            <?php 
             } 
            ?>

          </tbody>
        </table>
      </div>

</body>
</html>