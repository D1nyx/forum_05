<?php
    include_once 'verificar_sessao.php';
    if(isset($_GET['id_topico']) &&
        !empty($_GET['id_topico']) &&
        is_numeric($_GET['id_topico']) ){
            echo "A ver as mensagens do tópico".$_GET['id_topico'];
        }
        else{
        ?>
            <h3>Tópico não encontrado.</h3>
            <p>Clique<a href= "./topicos.php">aqui</a>para voltar aos tópicos.</p>  
        <?php
        die();
        }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum</title>
    <?php require_once 'metadados.php' ?>
</head>
<body>
        <div class = "container">
            <?php include_once 'header.php';?>
            <?php include_once 'navegacao.php';?>
            <div class = "my-1 p-3 bg-topico rounded">
                <div class = "row mb-3 topico-titulo">
                    _titulo_do_topico_
                </div>
                <div class = "row pb-2">
                    <div class = "col-sm-2 topico-utilizador p-2 text-center">  
                        _nome_do_utilizador_
                        <img src = "./assets/img/utilizador.svg" class = "img-fluid" alt = "imagem_utilizador">
                        _registado_desde_
                    </div>
                    <div class = "col-sm-10 topico-mensagem">
                        <div class = "row pb-2 pt-2 align-items-center">
                            <div class = "col-sm-8 text-left text-muted">   
                            <small id = "publicado-em">_publicado_em_</small>
                        </div>
                        <div class = "col-sm-4 text-end">
                            <a href = "./editar_mensagem.php?id_mensagem=">
                                <img src = "./assets/img/editar.png" class = "img-fluid topico-icones"
                                    alt = "imagem_editar" title  =  "Editar mensagem">
                            </a>
                            <a href = "./eliminar_mensagem.php?id_mensagem">
                                <img src = "./assets/img/eliminar.png" class = "img-fluid topico-icones"
                                    alt =  "imagem_eliminar" title =  "Eliminar mensagem">
                            </a>
                        </div>
                    </div>
                    <p id = "mensagem">
                        _mensagem_
                    </p>
                </div>
            </div>
            <div class = "row pt-2">
                <div class = "col-sm-2"></div>
                <div class = "col-sm-10 text-center">
                    <form>
                        <textarea class = "form-control mb-1" id = "mensagem" rows = "3"></textarea>
                        <button type = "submit" class = "btn btn-outline-success mt-1">Responder</button>
                    </form>
                </div>
            </div>
        </div>
        <?php include_once 'footer.php'; ?>
    </div>
</body>
</html>