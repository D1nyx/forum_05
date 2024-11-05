<?php
    include_once 'verificar_sessao.php';

    if (isset($_GET['id_topico']) && !empty($_GET['id_topico']) && is_numeric($_GET['id_topico'])) {
        echo "A ver as mensagens do tópico ".$_GET['id_topico'];
    }
    else {
        echo "id_topico inexistente ou inválido.";
    }
?>