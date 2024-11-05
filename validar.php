<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['username']) && isset ($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ( $username != 'utilizador' && $password != 'segredo') {
                $_SESSION['erro'] = 'Credenciais erradas';
                header('Location: login.php');
            }
            else {
                $_SESSION['username'] = $username;
                $_SESSION['tipo'] = 2; // 0 = ADMIN, 1 = GESTOR, 2 = UTILIZADOR
                header('Location: topicos.php');
            }
        }
    }
?>