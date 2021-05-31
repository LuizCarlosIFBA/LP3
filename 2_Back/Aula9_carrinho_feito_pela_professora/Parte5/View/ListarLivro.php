<?php 
$tituloPagina="Lista de Livros";
require "Cabecalho.php";
?>

<script>
function confirma(){
  return confirm("Confirma a exclusão?");
  
}
</script>

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
           <td>
           <form method="post" action="ExcluirLivro" onSubmit="return confirma();">
             <input type="hidden" name="id" value="<?php echo $listaLivros[$i]->getCodigo();?>">
             <input type="submit" class="btn btn-danger btn-sm" value= "Excluir">
           </form>
           </td>
           </tr>   
      <?php } ?>
    </tbody>
  </table>
<?php require "Rodape.php";?>