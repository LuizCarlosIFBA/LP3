<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mercadão 2.0</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="view/style.css" rel="stylesheet" type="text/css" />

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
  </script>
</head>

<body>

  <div class="formLogin">
    <form class="" name="formLogin" method="post" action="logincliente">
      <!-- action vai ter o tratamento do dado -->
      <div>
        <h3>Login</h3>
        </p>
        <p><input class="form-control" type="email" name="email" placeholder=" exemplo@mail.com" required></p>
        <p><input class="form-control" type="password" name="senha" placeholder="Sua senha" required></p>
        <div class="form-check" style="display: flex;">
          <input type="checkbox" class="form-check-input" id="lembrarsenha" name="lembrarsenha" value="1">
          <label class="form-check-label" for="lembrarsenha" style="margin-left: 10px;">Lembre-me</label>
        </div>
        <a href="CADASTRO"><p>Não tem conta? Cadastre-se aqui.</p></a>
        
        <input type="submit" class="btproduto" value="Entrar">
      </div>
    </form>
  </div>


  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>