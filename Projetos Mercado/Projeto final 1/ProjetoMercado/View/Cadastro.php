<?php
  $logado = false;
  $alterando = false;
  if(isset($_SESSION["usuario"]) && !isset($_SESSION["voltar"])){
    header("Location: Home");
    exit();
  } 
  else if(isset($_SESSION["voltar"])) {
    unset($_SESSION["voltar"]);
    $alterando = true;
  }
  if(isset($_SESSION["usuario"])){
    $logado = true;
    $usuario = new Usuario();
    $usuario = unserialize($_SESSION["usuario"]);
  }
?>

<?php $tituloPagina = "Cadastro";
require_once "Cabecalho.php";?>
  <style>
    /*Colunas de tabelas*/
    table.table > tbody > tr > td{
      border-top: 0px;
      border-bottom: 0;
    }
    .panel-default > .panel-heading > .panel-title{
      color: white;
      font-weight: bold;
    }
    .panel-default > .panel-heading{
      background-color: darkcyan;
    }
    .panel-default > .panel-body{
      background-color: #FAFAFA;
    }
    button.btn-info, button.btn-info:visited, button.btn-info:active{
      background-color: darkcyan;
      border-color: darkcyan;  
      font-weight: bold;
      opacity: 0.9;
      transition: 0.3s;
    }
    button.btn-info:hover{
      opacity: 1;
    }
    /*Animação*/
    .mask.full, .circle .fill {
      animation: fill ease-in-out 3s;
      transform: rotate(72deg);
    }
    /*Regras de começo e fim*/
    @keyframes fill{
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(72deg);
      }
    }
  </style>


  <script>
    const form = document.querySelectorAll("#form")
    const cpfInput = document.querySelectorAll("#cpf")
    const telefoneInput = document.querySelectorAll("#telefone")
    const senhaInput = document.querySelectorAll("#senha")
    const confirmarInput = document.querySelectorAll("#confirmar")
    const numeroInput = document.querySelectorAll("#numero")
    const cepInput = document.querySelectorAll("#cep")

    form.addEventListener("submit", (event) => { 
      event.preventDefault();

      if(!validaSenha(senhaInput.value, confirmarInput.value)){
        alert("Senhas diferentes.");
        return;        
      }
      if(!validaCpf(cpfInput.value, 11)){
        alert("O cpf deve ter 11 dígitos.");
        return;        
      }
      if(!validaCep(cepInput.value, 8)){
        alert("O cep deve ter 8 dígitos.");
        return;        
      }
      if(!validaNumero(numeroInput.value, 5)){
        alert("O número residencial deve ter no máximo 5 dígitos.");
        return;        
      }
      if(!validaTelefone(telefoneInput.value, 11)){
        alert("O número de telefone deve ter no máximo 11 dígitos.");
        return;        
      }
      form.submit();
    });

    function validaSenha(password1, password2){
      if (password1 == password2){
        return true;
      }
      return false;
    }
    function validaCpf(cpf, digitos){
      if (cpf.length == digitos){
        return true;
      }
      return false;
    }
    function validaCep(cep, digitos){
      if (cep.length == digitos){
        return true;
      }
      return false;
    }
    function validaNumero(numero, digitos){
      if (numero.length <= digitos){
        return true;
      }
      return false;
    } 
    function validaTelefone(telefone, digitos){
      if (telefone.length <= digitos){
        return true;
      }
      return false;
    }   
  </script>
</head>

<!--------------------------------------------------------------->

<body>
  <!--Barra de navegação-->
  <nav class="navbar">
    <div class=" container-fluid">

      <div class="navbar-header">

        <!--Botão das 3 barras na direita quando a tela está comprimida-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="glyphicon glyphicon-menu-hamburger"></span>
        </button>

        <!--Logo com link-->
        <a class="navbar-brand l2" href="Mercado">Mercado</a>

      </div>

      <!--Conteúdo da barra de navegação + Collapse-->
      <div class="collapse navbar-collapse" id="myNavbar">

      <!--Tópicos da barra de navegação-->
      <ul class="nav navbar-nav">

        <li><a class="l1" href="ListarProdutos">Produtos</a></li>
      <?php if($logado) { ?>
        <li><a class="l1" href="Atendimento">Atendimento</a></li>
      <?php } ?>

      </ul>

        <!--Formulário de pesquisa-->
        <form class="navbar-form navbar-left" action="Buscar" method="post">
          <div class="input-group">
            <input type="text" class="form-control" size="30" name="nome" placeholder="Qual produto deseja encontrar?">
            <div class="input-group-btn">
              <button class="btn btn-info search" type="submit">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </div>
          </div>
        </form>

        <!--Login e carrinho-->
        <ul class="nav navbar-nav navbar-right">

          <li><a class="l1" href="Carrinho"><span
                class="glyphicon glyphicon-shopping-cart"></span> Meu carrinho</a></li>

          <li><a class="l1" href="Login"><span class="glyphicon glyphicon-log-in"></span>
              Login</a></li>

        </ul>

      </div>

    </div>
  </nav>

  <!--------------------------------------------------------------->
  
  <?php
    if(isset($_SESSION["identificar"])) {
  ?>

  <p>&nbsp;</p>
  
  <div class="container text-center">
    <div class="row">
      
      <div class="col-sm-3"></div>
      
      <div class="col-sm-6 f21">
        <table class="table">
          <tr>

            <td>
              <div class="circle-wrap">
                <div class="circle">
      
                  <div class="mask full">
                    <div class="fill"></div>
                  </div>

                  <div class="mask half">
                    <div class="fill"></div>
                  </div>

                  <div class="inside-circle"> 40% </div>
      
                </div>
              </div>
            </td>
           
            <td>
              &nbsp;&nbsp;
            </td>
           
            <td>
              <span class="active glyphicon glyphicon-shopping-cart  f10 f19 f20"></span>
              <p class="f2 f19">Carrinho</p>
            </td>
           
            <td>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            &nbsp;&nbsp;
            </td>
            
            <td>
              <span class="glyphicon glyphicon-user f2 f10 f20"></span>
              <p class="f2 f13">Identificação</p>
            </td>
            
            <td>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            &nbsp;&nbsp;
            </td>
                     
            <td>
              <span class="glyphicon glyphicon-credit-card f10 f19 f20"></span>
              <p class="f2 f19">Pagamento</p>
            </td>
            
            <td>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            &nbsp;&nbsp;
            </td>
                       
            <td>
              <span class="glyphicon glyphicon-eye-open f10 f19 f20"></span>
              <p class="f2 f19">Confirmação</p>
            </td>
            
            <td>
            &nbsp;&nbsp;
            <span class="glyphicon glyphicon-arrow-right f8 f20"></span>
            &nbsp;&nbsp;
            </td>         
            
            <td>
              <span class="glyphicon glyphicon-ok-sign f10 f19 f20"></span>
              <p class="f2 f19">Concluir</p>
            </td>
            
          </tr>
        </table>
      </div>

      <div class="col-sm-3"></div>
      
    </div>
  </div>

  <?php
    }
  ?>

  <!--------------------------------------------------------------->

  <p>&nbsp;</p>
  <p>&nbsp;</p>

<?php if ($alterando) {?>
  <div class="col-sm-6 col-sm-offset-3">
    <div class="row">
    
      <div class="col-sm-3"></div>

      <div class="col-sm-6">
        <div class="alert alert-info">
          <p><strong>AVISO:</strong> Informe novamente o seu endereço.</p>
        </div>
      </div>

      <div class="col-sm-3"></div>
    </div>
  </div>    
<?php }?>

  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      <div class="panel panel-default">

        <div class="panel-heading text-center">
          <h3 class="panel-title">Cadastro de Usuário</h3>
        </div>

        <div class="panel-body">

      <?php if ($alterando) {?>
        <form class="f20" action="AlterarEndereco" method="post">
          <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="f8 f13" for="endereco">Endereço:</label>
                  <input type="text" class="form-control" name="endereco" placeholder="Digite seu endereço" required>
                </div>                              
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="f8 f13" for="numero">Número:</label>
                  <input type="text" class="form-control" name="numero" placeholder="Digite seu numero" required>
                </div>                               
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="f8 f13" for="cep">CEP:</label>
                  <input type="text" class="form-control" name="cep" placeholder="Digite seu CEP" required>
                </div>                               
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="f8 f13" for="idestado">Estado:</label>
                  <select class="form-control" name="idestado" required>
                    <option value="" disabled selected>Escolha seu estado</option>
                    <option value="1">Bahia</option>
                    <option value="2 Gerais">Minas Gerais</option>
                  </select> 
                </div>                         
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="f8 f13" for="idcidade">Cidade:</label>
                  <select class="form-control" name="idcidade" required>
                    <option value="" disabled selected>Escolha sua cidade</option>
                    <option value="1">Salvador</option>
                    <option value="2">Camaçari</option>
                  </select> 
                </div>                               
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="f8 f13" for="idbairro">Bairro:</label>
                  <select class="form-control" name="idbairro" required>
                    <option value="" disabled selected>Escolha seu bairro</option>
                    <option value="1">Cabula</option>
                    <option value="2">Ondina</option>
                  </select> 
                </div>                               
              </div>
            </div>

            &nbsp;

            <div class="form-group">
              <input type="hidden" name="idusuario" value="<?php echo $usuario->getIdUsuario()?>">
              <button type="submit" class="btn btn-info">Alterar</button>
              &nbsp;&nbsp;
              <a href="Login" class="f2 f13">Já possui uma conta? Faça o login aqui</a>
            </div>
          </form>


        <?php } else {?>
          <form id="form" class="f20" action="Cadastrar" method="post">

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="f8 f13" for="email">E-mail:</label>
                  <input type="email" class="form-control" name="email" placeholder="Digite seu e-mail" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="f8 f13" for="senha">Senha:</label>
                  <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
                </div>                
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="f8 f13" for="confirmar_senha">Confirmar senha:</label>
                  <input type="password" class="form-control" name="confirmar" placeholder="Confirme sua senha" required>
                </div>                
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="f8 f13" for="nome">Nome:</label>
                  <input type="text" class="form-control" name="nome" placeholder="Digite seu nome" required>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="f8 f13" for="cpf">CPF:</label>
                  <input type="text" class="form-control" name="cpf" placeholder="Digite seu CPF" required>
                </div>                              
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="f8 f13" for="telefone">Telefone:</label>
                  <input type="text" class="form-control" name="telefone" placeholder="Digite seu telefone" required>
                </div>                               
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="f8 f13" for="endereco">Endereço:</label>
                  <input type="text" class="form-control" name="endereco" placeholder="Digite seu endereço" required>
                </div>                              
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="f8 f13" for="numero">Número:</label>
                  <input type="text" class="form-control" name="numero" placeholder="Digite seu numero" required>
                </div>                               
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label class="f8 f13" for="cep">CEP:</label>
                  <input type="text" class="form-control" name="cep" placeholder="Digite seu CEP" required>
                </div>                               
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="f8 f13" for="idestado">Estado:</label>
                  <select class="form-control" name="idestado" required>
                    <option value="" disabled selected>Escolha seu estado</option>
                    <option value="1">Bahia</option>
                    <option value="2 Gerais">Minas Gerais</option>
                  </select> 
                </div>                         
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="f8 f13" for="idcidade">Cidade:</label>
                  <select class="form-control" name="idcidade" required>
                    <option value="" disabled selected>Escolha sua cidade</option>
                    <option value="1">Salvador</option>
                    <option value="2">Camaçari</option>
                  </select> 
                </div>                               
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label class="f8 f13" for="idbairro">Bairro:</label>
                  <select class="form-control" name="idbairro" required>
                    <option value="" disabled selected>Escolha seu bairro</option>
                    <option value="1">Cabula</option>
                    <option value="2">Ondina</option>
                  </select> 
                </div>                               
              </div>
            </div>

            &nbsp;

            <div class="form-group">
              <input type="hidden" name="permissao" value=0>
              <button type="submit" class="btn btn-info">Cadastrar</button>
              &nbsp;&nbsp;
              <a href="Login" class="f2 f13">Já possui uma conta? Faça o login aqui</a>
            </div>
          </form>

          <?php }?>

          <br>
        </div>
      </div>
    </div>
  </div>

  <p>&nbsp;</p>
  
<!--------------------------------------------------------------->
<?php require_once "Rodape.php";?>
