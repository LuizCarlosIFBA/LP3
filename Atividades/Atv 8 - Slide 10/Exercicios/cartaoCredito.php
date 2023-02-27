<!DOCTYPE HTML>
<html lang=”pt-br”>

<head>
    <meta charset=”UTF-8”>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title></title>
</head>

<?php
session_start();
?>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <h1>Cadastro do Cliente - Dados do Cartão de Crédito</h1>
    <?php echo "CPF/Nome do cliente:".$_SESSION['cpf']."/".$_SESSION['nome']."";?>
    <form>
        <label class="form-check-label" for="Visa">Bandeira:</label>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="visa" id="Visa" value="option1">
            <label class="form-check-label" for="Visa">Visa</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="master" id="Master" value="option2">
            <label class="form-check-label" for="Master">Master</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="american" id="American" value="option3">
            <label class="form-check-label" for="American">American</label>
        </div>

        <div class="mb-3">
            <label for="numero cartão" class="form-label"><b>Número do cartão:</b></label>
            <input type="text" class="form-control" id="numeroCartao">
        </div>
        <div class="mb-3">
            <label for="código do cartão" class="form-label"><b>Código do cartão:</b></label>
            <input type="text" class="form-control" id="codigoCartao">
        </div>

        <div class="mb-3">
            <label for="validade" class="form-label"><b>Validade:</b></label>
            <select>
                <option selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>

            <select>
                <option selected>2030</option>
                <option value="2029">2029</option>
                <option value="2028">2028</option>
                <option value="2027">2027</option>
                <option value="2026">2026</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
            </select>
        </div>

        <button type="submit" class="btn btn-light">Próximo</button>
    </form>

</body>

</html>