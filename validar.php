<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['username']) && isset ($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            include_once 'bd.php';
            $rs = autenticarUtilizador($username, $password);
            if ( $rs == null) {
                $_SESSION['erro'] = 'Credenciais erradas';
                header('Location: login.php');
            }
            else {
                $_SESSION['idutilizador'] = $rs['idutilizador'];
                $_SESSION['utilizador'] = $rs['utilizador'];
                $_SESSION['tipo'] = $rs['tipo']; // 0 = ADMIN, 1 = UTILIZADOR
                header('Location: topicos.php');
            }
        }
    }
?>