<?php
    session_start();
    if ( !isset($_SESSION['idutilizador']) ||
            !isset($_SESSION['utilizador']) || !isset($_SESSION['tipo']) ) {

        header("Location: ./login.php");
        die();
    }
    if ( $_SESSION['tipo'] == 0) {
        if ( isset($_POST['utilizador'])) {
            require_once ('../bd.php');
            $sql = 'SELECT * FROM t_utilizador WHERE utilizador = '.$_POST['utilizador'];
            echo count(consultarBD($sql));
            die();
        }
    }
    echo 1;
?>  