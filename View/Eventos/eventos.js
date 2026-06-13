// Validação do formulário de cadastro de evento
function validarEvento() {
    var nome = document.getElementById("nome").value.trim();
    var data = document.getElementById("data").value;
    var local = document.getElementById("local").value.trim();

    if (nome === "" || data === "" || local === "") {
        alert("Por favor, preencha todos os campos.");
        return false;
    }

    if (nome.length < 3) {
        alert("O nome do evento deve ter no mínimo 3 caracteres.");
        return false;
    }

    return true;
}

// Validação do formulário de atualização de evento
function validarAtualizacaoEvento() {
    var data = document.getElementById("data").value;
    var local = document.getElementById("local").value.trim();

    if (data === "" || local === "") {
        alert("Por favor, preencha a nova data e o novo local.");
        return false;
    }

    return true;
}
