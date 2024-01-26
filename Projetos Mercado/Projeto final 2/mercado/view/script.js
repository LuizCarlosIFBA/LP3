function yesnoCheck() {
    if (document.getElementById('noCheck').checked) {
        document.getElementById('cep').setAttribute("disabled", "");
        document.getElementById('endereco').setAttribute("disabled", "");
        document.getElementById('numero').setAttribute("disabled", "");
        document.getElementById('complemento').setAttribute("disabled", "");

        document.getElementById('cep').removeAttribute("required");
        document.getElementById('endereco').removeAttribute("required");
        document.getElementById('numero').removeAttribute("required");
        document.getElementById('complemento').removeAttribute("required");
    }
    else{
      document.getElementById('cep').setAttribute("required", "");
      document.getElementById('endereco').setAttribute("required", "");
      document.getElementById('numero').setAttribute("required", "");
      document.getElementById('complemento').setAttribute("required", "");

      document.getElementById('cep').removeAttribute("disabled");
      document.getElementById('endereco').removeAttribute("disabled");
      document.getElementById('numero').removeAttribute("disabled");
      document.getElementById('complemento').removeAttribute("disabled");
    }

}

// MODAL SCRIPT
const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
// FIM MODAL SCRIPT




// CHECK FORMS

function check_formCad(){
  
  if(formCadastro.senha.value != formCadastro.senha_conf.value){
    alert("Senhas não correspondem!");
    return false;
  }

  if(formCadastro.email.value != formCadastro.email_conf.value){
    alert("Emails não correspondem!");
    return false;
  }
  
  return true;
}

function check_senhaForm(){
  
  if(formMudarSenha.novaSenha.value != formMudarSenha.novaSenhaConf.value){
    alert("Senhas não correspondem!");
    return false;
  }
  
  return true;
}

function check_alteraSenhaForm(){
  if(formMudarSenha.novaSenha.value != formMudarSenha.novaSenhaConf.value){
    alert("Senhas não correspondem!");
    return false;
  }
  
  return true;
}

function check_emailDados(){
  
  if(formEditarDados.email.value != formEditarDados.conf_email.value){
    alert("Emails não correspondem!");
    return false;
  }
  
  return true;
}