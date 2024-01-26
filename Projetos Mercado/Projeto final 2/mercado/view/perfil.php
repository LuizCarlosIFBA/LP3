<body> 
<!-- ------------------------ MODAIS ------------------------ -->

    <div class="modal" id="senhaModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Mudar senha</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="alterarsenha" method="post" id="formMudarSenha" class="mx-auto w-75" onsubmit="return check_senhaForm()">
              <input class="form-control" type="password" id="senhaAtual" name="senhaAtual" placeholder="Senha atual" required>
              <input class="form-control mt-4" type="password" id="novaSenha" name="novaSenha" placeholder="Nova senha" required>
              <input class="form-control mt-1" type="password" id="novaSenhaConf" name="novaSenhaConf" placeholder="Confirmar senha" required>
              <input type="hidden" name = "idcliente" value = <?php echo $cliente->getIdcliente(); ?>>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" form="formMudarSenha" class="btn btn-primary">Mudar senha</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="excluirModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Excluir conta</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Tem certeza que deseja excluir sua conta?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <form name='formExcluirConta' method='post' action='excluirconta'>
              <?php echo "<input type='hidden' name='IDusuario' value='". $_SESSION["idusuario"] . "'>";?>
              <input type="submit" class="btn btn-danger" value="Excluir"></input>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="dadosModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar dados</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="alterardados" method="post" id="formEditarDados" class="mx-auto w-100" onsubmit="return check_emailDados()">
              
              <label class="form-label" for="nome">Nome Completo:</label>
              <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $cliente->getNome(); ?>" required>

              <label class="form-label mt-2" for="cpf">CPF:</label>
              <input class="form-control" type="text" id="cpf" name="cpf" value="<?php echo $cliente->getCPF(); ?>" minlength="11" maxlength="11" required>

              <label class="form-label mt-2" for="email">E-mail:</label>
              <input class="form-control" type="email" id="email" name="email" value="<?php echo $cliente->getEmail(); ?>" required>

              <label class="form-label mt-2" for="conf_email">Confirmar E-mail:</label>
              <input class="form-control" type="email" id="conf_email" name="conf_email" value="" required>

              <label class="form-label mt-2" for="telefone">Telefone:</label>
              <input class="form-control" type="text" id="telefone" name="telefone" value="<?php echo $cliente->getTelefone(); ?>" minlength="10" maxlength="12" required>
              <input type="hidden" name = "idcliente" value = <?php echo $cliente->getIdcliente()?>>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" form="formEditarDados" class="btn btn-primary">Alterar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal" id="enderecoModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar endereço</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="alterarendereco" method="post" id="formEditarEndereco" class="mx-auto w-100">
              
              <label class="form-label" for="cep">CEP:</label>
              <input class="form-control" type="text" id="cep" name="cep" value="<?php echo $cliente->getCep(); ?>" minlength="8" maxlength="8" required>

              <label class="form-label mt-2" for="endereco">Endereço:</label>
              <input class="form-control" type="text" id="endereco" name="endereco" value="<?php echo $cliente->getEndereco(); ?>" required>

              <label class="form-label mt-2" for="numero">Número:</label>
              <input class="form-control" type="text" id="numero" name="numero" minlength="1" maxlength="3" value="<?php echo $cliente->getNumero(); ?>" required>

              <label class="form-label mt-2" for="complemento">Complemento:</label>
              <input class="form-control" type="text" id="complemento" name="complemento" value="<?php echo $cliente->getComplemento(); ?>" required>
              <input type="hidden" name = "idcliente" value = <?php echo $cliente->getIdcliente(); ?>>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="submit" form="formEditarEndereco" class="btn btn-primary">Confimar</button>
          </div>
        </div>
      </div>
    </div>

  <!-- ------------------------ FIM MODAIS ------------------------ -->
  
  
  <div class="container margin-top-bot">
    <div>
      <h1 class="mb-4 mt-0">Meu perfil</h1>
    </div>

    <div class="row">
      <div class="col-6">
        <h4 class="my-3">Meus dados</h4>
        <p>Nome: <?php echo $cliente->getNome(); ?></p>
        <p>CPF: <?php echo $cliente->getCPF(); ?></p>
        <p>E-mail: <?php echo $cliente->getEmail(); ?></p>
        <p>Telefone: <?php echo $cliente->getTelefone(); ?></p>

        <button class="btn btn-primary mt-1" type="button" id="editarDados" data-bs-toggle="modal" data-bs-target="#dadosModal">Editar dados</button>
        <button class="btn btn-primary mt-1" type="button" data-bs-toggle="modal" data-bs-target="#senhaModal">Mudar senha</button>
      </div>

      <div class="col-6">
        <h4 class="my-3">Meu endereço</h4>
        <p>CEP: <?php echo $cliente->getCEP(); ?></p>
        <p>Endereço: <?php echo $cliente->getEndereco(); ?></p>
        <p>Número: <?php echo $cliente->getNumero(); ?></p>
        <p>Complemento: <?php echo $cliente->getComplemento(); ?></p>

        <button class="btn btn-primary mt-1" type="button" data-bs-toggle="modal" data-bs-target="#enderecoModal">Editar endereço</button>
      
      </div>
    </div>

    <button class="btn btn-danger mt-4" type="button" data-bs-toggle="modal" data-bs-target="#excluirModal">Excluir conta</button>
  </div>
  <script src="view/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>