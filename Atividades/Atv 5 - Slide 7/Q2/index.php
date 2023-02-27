<!doctype html>
<html lang="en">



<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <h1>Formulário de matrícula</h1>

  <form class="row g-3" action="resultado.php" method="GET">
    <div class="col-12">
      <label for="nome" class="form-label"><b>nome:</b></label>
      <input type="text" class="form-control" name="nome" placeholder="Informe seu nome">
    </div>
    <div class="col-12">
      <label for="CPF" class="form-label"><b>CPF:</b></label>
      <input type="text" class="form-control" name="cpf" placeholder="Informe seu CPF">
    </div>
    <div class="col-md-12">
      <label for="email" class="form-label"><b>Email</b></label>
      <input type="email" class="form-control" name="email" placeholder="Informe seu e-mail">
    </div>
    
    <div class="col-md-12">
      <label for="inputState" class="form-label"><b>Curso</b></label>
      <select name="curso" class="form-select">
        <option selected>ADM</option>
        <option>S.I</option>
        <option>Direito</option>
      </select>
    </div>

    <div class="row">
      <div class="form-check-inline">
        <br/>

        <label for="turno" class="form-label"><b>Turno</b></label>

        <input class="form-check-input" type="radio" name="turno" value="Matutino">
        <label class="form-check-label" for="inlineRadio1">Matutino</label>

        <input class="form-check-input" type="radio" name="turno" value="Vespertino">
        <label class="form-check-label" for="inlineRadio2">Vespertino</label>

        <input class="form-check-input" type="radio" name="turno" value="Noturno">
        <label class="form-check-label" for="inlineRadio3">Noturno</label>
      </div>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>