/*arquivo javascript*/

function validacao(){
    
    var vazio;

    if(document.form.nome.value=="" || document.form.senha.value==""){
        vazio = true;
        alert("Por favor, preencha todos os campos ");
        document.form.nome.focus();
        return false;
    }

    if(document.form.email.value=="" || document.form.cpf.value==""){
        vazio = true;
        alert("Por favor, preencha todos os campos ");
        document.form.nome.focus();
        return false;
    }

    if(document.form.endereco.value=="" || document.form.cidade.value==""){
        vazio = true;
        alert("Por favor, preencha todos os campos ");
        document.form.nome.focus();
        return false;
    }
    
    if(document.form.cep.value==""){
        vazio = true;
        alert("Por favor, preencha todos os campos ");
        document.form.nome.focus();
        return false;
    }

    
}
