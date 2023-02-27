<!DOCTYPE HTML>
<html lang=”pt-br”>
<head>
  <title>Cadastro</title>
</head>
<body>
<h1>Cadastro</h1>
<br>
  <form action="../controladorCliente.php" method="post">
    Nome: <input type="text" id="nome" name="nome" minlength="4" maxlength="8" size="10"/><br><br>
    CPF: <input type="text" id="cpf" name="cpf" minlength="4" maxlength="8" size="10"/><br><br>
    E-mail: <input type="text" id="email" name="email" minlength="4" maxlength="8" size="10"/><br><br>

    <br>
    <button id="btnIncluir">Incluir</button>
    <button id="btnCancelar">Cancelar</button>
  </form>
</body>
</html>