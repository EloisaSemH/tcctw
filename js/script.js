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