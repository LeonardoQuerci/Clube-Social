// Validação do formulário de cadastro de usuário
function validarCadastro() {
    var id = document.getElementsByName("id")[0].value.trim();
    var nome = document.getElementsByName("nome")[0].value.trim();
    var senha = document.getElementsByName("senha")[0].value;
    var sexo = document.querySelector('input[name="sexo"]:checked');

    if (id === "" || nome === "" || senha === "") {
        alert("Por favor, preencha todos os campos obrigatórios.");
        return false;
    }

    if (senha.length < 4) {
        alert("A senha deve ter no mínimo 4 caracteres.");
        return false;
    }

    if (!sexo) {
        alert("Por favor, selecione o sexo.");
        return false;
    }

    return true;
}
