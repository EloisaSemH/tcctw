function valida() {
    var resultado = document.getElementById(campo);
    // var senha1 = document.validacao.senha1.value;
    senha1 = document.getElementById(senha1).value;

    if( strlen(senha1) < 8){
        resultado.innerHTML = "A senha precisa conter, pelo menos, 8 caracteres";
    }
}

function validarSenha(senha1, senha2, campo){
    var resultado = document.getElementById(campo);
    senhaPrimaria = document.getElementById(senha1).value;
    senhaSecundaria = document.getElementById(senha2).value;
    if(senhaPrimaria == senhaSecundaria){
        resultado.innerHTML = "Senhas Iguais";
    }else{
        resultado.innerHTML = "Senhas diferentes";
    }
}

