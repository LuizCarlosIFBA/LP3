<?php 
//Página que lista os produtos (livros) selecionados para o carrinho
$tituloPagina="Livros selecionados";
require "Cabecalho.php";
?>
  <a href="ListarLivro" class = "btn btn-default">Home</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>código</th>
        <th>Título</th>
        <th>Preço</th>
        <th>Quantidade</th>
        <th>SubTotal</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($itensCarrinho as $item): ?>
           <tr>
           <td><?php echo $item->getProduto()->getCodigo(); ?></td>
           <td><?php echo $item->getProduto()->getTitulo(); ?></td>
           <td>R$ <?php echo number_format($item->getProduto()->getPreco(),2,',','.'); ?></td>
           <td>
           <form action="CarrinhoAltQuant" method="post">
              <input type="hidden" name="id" value="<?php echo $item->getProduto()->getCodigo(); ?>">
              <input type="text" name="quantidade" value="<?php echo $item->getQuantidade(); ?>" size="2" >
              <button type="submit" class="btn btn-primary btn-xs">Alterar</button>
           </form>
           </td>
           <td>R$ <?php echo number_format($item->getSubTotal(),2,',','.'); ?></td>
           <td>
           <form method="post" action="ApagaItemCarrinho" >
             <input type="hidden" name="id" value="<?php echo $item->getProduto()->getCodigo(); ?>">
             <input type="submit" class="btn btn-danger btn-sm" value= "Excluir">
           </form>
           </td>
           </tr>   
      <?php endforeach; ?>
    </tbody>
    <tfoot>
       <tr>
          <td colspan="4"><b>Total</b></td>
          <td>R$ <?php echo number_format($carrinho->getTotal(),2,',','.'); ?></td>  
       </tr>
    </tfoot>
  </table>
<?php require "Rodape.php";?>
