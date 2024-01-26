<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mercadão 2.0</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  
  <link href="view/style.css" rel="stylesheet" type="text/css" />

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
    </script>
</head>

<body>

  <div class="divCadastro">
    <form class="formCadastro" name="formCadastro" method="post" action="ControleCadastro" onsubmit="return check_formCad()">
      <!-- action vai ter o tratamento do dado -->
      <h3>Cadastre-se</h3>
<!-- ($nome, $senha, $email, $cpf,  $telefone, $cep, $endereco, $numero, $complemento) -->
      <div class="formContent">
        <div class="cadastroLeft">
          <p>Seus dados</p>
          <input class="form-control" type="text" name="cpf" placeholder="Seu CPF (apenas números)" required minlength="11" maxlength="11">
  
          <!-- <div class="doubleLine"> -->
            <input class="form-control" type="text" name="nome" placeholder="Nome completo" required>
            <!-- <input class="form-control" type="text" name="lastName" placeholder="Seu sobrenome" required> -->
          <!-- </div> -->
  
          <input class="form-control" type="email" name="email" placeholder="EX.: exemplo@mail.com" required>
          <input class="form-control" type="email" name="email_conf" placeholder="Repita seu email" required>
            
          
          <p style="margin: 15px 0 3px;">Sua senha</p>
  
          <div class="doubleLine">
            <input class="form-control" type="password" name="senha" placeholder="Sua senha" minlength="8" required>
            <input class="form-control" type="password" name="senha_conf" placeholder="Repita sua senha" minlength="8" required>
          </div>
        </div>
  
        <div class="cadastroRight">
          <p id="enderecop">Endereço de entrega</p>
          <input class="form-control" type="text" name="cep" placeholder="CEP (apenas números)" required minlength="8" maxlength="8">
            
          <input class="form-control" type="text" name="endereco" placeholder="Endereço" required>
  
          <div class="doubleLine">
            <input class="form-control" type="text" name="numero" placeholder="Número" required minlength="1" maxlength="3">
            <input class="form-control" type="text" name="complemento" placeholder="Complemento" required>
          </div>
  
          <p style="margin: 15px 0 3px;">Telefone de contato</p>
          <input type="text" name="telefone" class="form-control" placeholder="Telefone (apenas núemros)" minlength="10" maxlength="12" required>
  
        </div>
      </div>

      <a href="./login.php"><p>Já possui conta? Faça login aqui.</p></a>
      <input type="submit" class="btproduto" value="Cadastrar">
    </form>
  </div>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>