<?php
  require "View/Cabecalho.php";
?>
  <a href="NovoLivro" class="btn btn-primary">Novo Livro</a>
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
<?php
  require "View/Rodape.php";
?>