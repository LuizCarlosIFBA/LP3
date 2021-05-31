<?php 
//página de cadastro de novos livros

$tituloPagina = "Cadastro do Livros";
require 'Cabecalho.php';
?>

  <form name="cadLivro" method = "post" action="incluirLivro">
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
        <input type="text" class="form-control" id="ano" placeholder="Informe o ao de publicacao" name="ano" required>
      </div>
    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="text" class="form-control" id="preco" placeholder="Informe o preço" name="preco" required>
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
  </form>
<?php require "Rodape.php";?>