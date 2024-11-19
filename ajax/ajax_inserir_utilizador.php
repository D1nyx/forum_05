<?php
session_start();
if (
    !isset($_SESSION['idutilizador']) ||
    !isset($_SESSION['utilizador']) || !isset($_SESSION['tipo'])
) {

    header("location: ../login.php");
    die();
}

if ($_SESSION['tipo'] == 0) { // é admin
    if (isset($_POST['utilizador']) && isset($_POST['senha']) && isset($_POST['tipo'])) {
        require_once("../bd.php");
        $utilizador = $_POST['utilizador'];
        $senha = md5($_POST['senha']);
        $tipo = $_POST['tipo'];
        $sql = "INSERT INTO utilizador(utilizador, senha, tipo) VALUES ";
        $sql .= "('" . $utilizador . "', '" . $senha . "', '" . $tipo . "')";
        echo consultarBD($sql);
    }
    die();
}
?>