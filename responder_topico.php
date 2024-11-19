<?php
    include_once 'verificar_sessao.php';
    include_once 'bd.php';
    if (isset($_GET['id_topico']) && !empty($_GET['id_topico']) && is_numeric($_GET['id_topico']) ) {
        if (isset($_POST['mensagem']) && !empty($_POST['mensagem']) ) {
            $sql = 'INSERT INTO t_mensagem (refidutilizador, refidtopico, mensagem) VALUES';
            $sql .= ' ('.$_SESSION['idutilizador'].','.$_GET['id_topico'].',"'.$_POST['mensagem'].'")';
            consultarBD($sql);
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    }
    else {
        ?>
            <h3>Tópico não encontrado.</h3>
            <p>Clique <a href="./topicos.php">aqui</a> para voltar aos tópicos.</p>
        <?php
    }
?>