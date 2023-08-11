function mascara()
{
    var cpf = document.getElementById('cpf_cliente');
    
    cpf.value = value.replace(/\D/g, ''); //remove todos os caracteres não númericos
    if (cpf.value.length == 3 || cpf.value.length == 7)
    {
        cpf.value = cpf.value + ".";
    }
    else if (cpf.value.length == 11)
    {
        cpf.value = cpf.value + "-"
    }
}

function verificarSenha()
{

}
