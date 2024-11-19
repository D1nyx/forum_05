<?php
include_once 'verificar_sessao.php';
if ( $_SESSION['tipo'] !=0 ) { // 0 admin
    header ("Location: ./topicos.php");
    die(); 
}
include_once 'bd.php';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum05</title>
    <script scr="jquery/jquery-3.7.1.js"></script>
    <?php require_once 'metadados.php'; ?>
    <script src="js/criar_utilizador.js"></script>
</head>

<body>
    <div class="container">
        <?php include_once 'header.php'; ?>
        <?php include_once 'navegacao.php'; ?>
        <form action="" method="POST" onsubmit="event.preventDefault(); submitUtilizador();">
            <div class="row text-center fw-light">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 my-3">
                    <div class="form-floating">
                        <input type="text" class="form-control my-2" id="username" name="username"
                            placeholder="Digite o seu nome de utilizador" oninput="validarUsername()" autocomplete="off"
                            required>
                        <label for="username" id="username-label">Nome de Utilizador</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control my-2" id="password" name="password"
                            placeholder="Palavra Passe" oninput="validarPassword()" required>
                        <label for="password" id="password-label">Palavra Passe</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control my-2" id="confpassword" name="confpassword"
                            placeholder="Confirme a palavra passe" oninput="validarConfpassword()" required>
                        <label for="confpassword-label" id="confpassword-label">Confirme a palavra passe</label>
                    </div>
                    <select class="form-select my-2 fw-light" id="tipo">
                        <option value="0" class="text-danger">Administrador</option>
                        <option value="1" class="fw-light">Moderador</option>
                        <option value="2" class="fw-light" selected>Utilizador</option>
                    </select>
                    <button type="submit" class="btn btn-outline-success my-2 fw-light">Criar utilizador</button>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </form>
        <table class="table table-sm table-stripped table-hover table-bordered mt-2">
        </table>
        <?php include_once 'footer.php'; ?>
    </div>
</body>
</html>