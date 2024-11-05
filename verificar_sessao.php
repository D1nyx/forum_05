<?php
    session_start();
    if(!isset($_SESSION['username'])) {
        $_SESSION['erro'] = 'Inicie a sessão';
        header('Location: login.php');
        die();
    }
?>