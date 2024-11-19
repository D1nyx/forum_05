function validarCarateres(texto, op) {
    let carateresEspeciais = '';
    if (op == 0 || undefined) { // espaços
        carateresEspeciais = /[ ]+/;
    }
    else if (op == 1) { // carateres especiais
        carateresEspeciais = /[!@#$%^&*()ºª€£§«»¨_+\-=\[\]{};':"\\|,.<>\/?]+/;
    }
    else if (op == 2) { // carateres portugueses
        carateresEspeciais = /[áàâãäéèêëíìîïóòôõöúùûçñÁÀÂÃÄÉÈÊËÍÌÎÏÓÒÔÕÖÚÙÛÇÑ]+/;
    }
    if (carateresEspeciais.test(texto)) {
        return true;
    }
    return false;
}

function validarUsername() {
    let username = document.getElementById('username');
    const username_label = document.getElementById('username-label');
    let msg = 'Nome de utilizador';

    if (username.value.trim().length == 0) {
        msg = 'Nome de utilizador: Preencha este campo';
    } else if (username.value.trim().length < 4) {
        msg = 'Nome de utilizador: Pelo menos 4 caracteres';
    } else if (validarCaracteres(username.value.trim(), 0)) {
        msg = 'Nome de utilizador: Não digite espaços';
    } else if (validarCaracteres(username.value.trim(), 1)) {
        msg = 'Nome de utilizador: Não digite caracteres especiais';
    } else if (validarCaracteres(username.value.trim(), 2)) {
        msg = 'Nome de utilizador: Não digite caracteres portugueses';
    }

    if (msg != 'Nome de utilizador') {
        username.className = 'form-control is-invalid my-2';
        username_label.style.color = 'red';
        username_label.innerHTML = msg;
    } else {
        let endereco = 'ajax/ajax_verificar_utilizador.php';
        var parametros = 'utilizador=' + username.value.trim() + '';
        $.ajax({
            url: endereco,
            type: 'post',
            data: parametros,
            timeout: 5000,
            success: function (resultado) {
                if (resultado == 0) {
                    username.className = 'form-control is-invalid my-2';
                    username_label.style.color = 'red';
                    msg = 'Nome de utilizador já existe um utilizador com esse nome';
                } else {
                    username.className = 'form-control is-valid my-2';
                    username_label.style.color = 'green';
                    msg = 'Nome de utilizador';
                }
                username_label.innerHTML = msg;
            },
            error: function (jqxhr, textstatus, errormessage) {
                console.log('Erro em criar_utilizador.js:', jqxhr, textstatus, errormessage);
            },
        });
    }
}

function validarPassword() {
    const password = document.getElementById('password');
    const password_label = document.getElementById('password-label');
    const confpassword = document.getElementById('confpassword');
    const confpassword_label = document.getElementById('confpassword-label');
    let msg = 'Palavra passe';
    if (password.value.length == 0) {
        msg = 'Palavra passe: Preencha este campo';
    } else if (password.value.length < 8) {
        msg = 'Palavra passe: Digite pelo menos 8 caracteres';
    } else if (validarCarateres(password.value, 0)) {
        msg = 'Palavra passe: Não digite espaços';
    } else if (validarCarateres(password.value, 2)) {
        msg = 'Palavra passe: Não digite caracteres portugueses';
    } else if (confpassword.value.length >= 8 && password.value == confpassword.value) {
        confpassword.className = 'form-control is-valid my-2';
        confpassword_label.style.color = 'green';
        confpassword_label.innerHTML = 'Confirme a palavra passe';
    } else if (confpassword.value.length >= 8 && password.value != confpassword.value) {
        confpassword.className = 'form-control is-invalid my-2';
        confpassword_label.style.color = 'red';
        confpassword_label.innerHTML = 'Confirme Palavra passe: Palavras passe diferentes';
    }
    if (msg != 'Palavra passe') {
        password.className = 'form-control is-invalid my-2';
        password_label.style.color = 'red';
    } else {
        password.className = 'form-control is-valid my-2';
        password_label.style.color = 'green';
    }
    password_label.innerHTML = msg;
}

function validarConfpassword() {
    const password = document.getElementById('password');
    const confpassword = document.getElementById('confpassword');
    const confpassword_label = document.getElementById('confpassword-label');
    let msg = 'Confirme a palavra passe';
    if (confpassword.value.length == 0) {
        msg = 'Confirme a palavra passe: Preencha este campo';
    }
    else if (confpassword.value.length < 8) {
        msg = 'Confirme a palavra passe: Digite pelo menos 8 carateres';
    }
    else if (password.value.length >= 8 && password.value != confpassword.value) {
        msg = 'Confirme a palavra passe: Palavras passe diferentes';
    }
    if (msg != 'Confirme a palavra passe') {
        confpassword.className = 'form-control is-invalid my-2';
        confpassword_label.style.color = 'red';
    }
    else {
        confpassword.className = 'form-control is-valid my-2';
        confpassword_label.style.color = 'green';
    }
    confpassword_label.innerHTML = msg;
}

function submitUtilizador() {
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const confpassword = document.getElementById('confpassword');
    const tipo = document.getElementById('tipo');
    const username_label = document.getElementById('username-label');
    const password_label = document.getElementById('password-label');
    const confpassword_label = document.getElementById('confpassword-label');

    if (username_label.style.color == 'green' &&
        password_label.style.color == 'green' &&
        confpassword_label.style.color == 'green') {

        endereco = 'ajax/ajax_inserir_utilizador.php';
        parametros = 'utilizador=' + username.value.trim();
        parametros += '&senha=' + password.value.trim();
        parametros += '&tipo=' + tipo.value;

        $.ajax({
            type: 'POST',
            url: endereco,
            data: parametros,
            dataType: 'html',
            timeout: 5000,
            success: function () {
                username.value = '';
                password.value = '';
                confpassword.value = '';
                tipo.value = 2;
                username.className = 'form-control my-2 fw-light';
                password.className = 'form-control my-2 fw-light';
                confpassword.className = 'form-control my-2 fw-light';
                username_label.style.color = null;
                password_label.style.color = null;
                confpassword_label.style.color = null;
                alert('Utilizador inserido com sucesso');
            },
            error: function (jqxhr, textStatus, errorMessage) {
                console.log("Erro em inserir utilizador:", jqxhr, textStatus, errorMessage);
            }
        });
    }
}
