<?php 
//Pagina que lista todos os livros (produtos) da livraria
$tituloPagina="Lista de Livros";
require "Cabecalho.php";
?>

  <a href="NovoLivro" class="btn btn-primary">Novo Livro</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>código</th>
        <th>Título</th>
        <th>Preço</th>
      </tr>
    </thead>
    <tbody>
      <?php for($i=0;$i<count($listaLivros);$i++){ ?>
           <tr>
           <td><?php echo $listaLivros[$i]->getCodigo(); ?></td>
           <td><?php echo $listaLivros[$i]->getTitulo(); ?></td>
           <td><?php echo $listaLivros[$i]->getPreco(); ?></td>
           <td>
           <form method="post" action="AddItemCarrinho" >
             <input type="hidden" name="id" value="<?php echo $listaLivros[$i]->getCodigo();?>">
             <input type="submit" class="btn btn-primary btn-sm" value= "Add carrinho">
           </form>
           </td>
           </tr>   
      <?php } ?>
    </tbody>
  </table>
<?php require "Rodape.php";?>