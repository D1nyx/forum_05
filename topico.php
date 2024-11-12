<?php
    include_once 'verificar_sessao.php';
    include_once 'bd.php';
    if(isset($_GET['id_topico']) &&
        !empty($_GET['id_topico']) &&
        is_numeric($_GET['id_topico']) ){
            $sql = 'SELECT titulo FROM t_topico WHERE idtopico='.$_GET['id_topico'];
            $rs = consultarBD($sql);
            $titulo = $rs[0]['titulo'];
            $sql = 'SELECT idmensagem, mensagem, datamensagem, idutilizador, utilizador, dataregisto';
            $sql .= ' FROM t_mensagem JOIN t_utilizador ON';
            $sql .= ' t_mensagem.refidutilizador = t_utilizador.idutilizador';
            $sql .= ' WHERE refidtopico = '.$_GET['id_topico'];
            $sql .= ' ORDER BY idmensagem ASC';
            $rs = consultarBD($sql);
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
                    <?php echo $titulo; ?>
                </div>
                <?php
                foreach ($rs as $registo) {
                    $idmensagem = $registo['idmensagem'];
                    $mensagem = $registo['mensagem'];
                    $datamensagem = date_format(date_create($registo['datamensagem']),"d/m/Y H:i:s");
                    $idutilizador = $registo['idutilizador'];
                    $utilizador = $registo['utilizador'];
                    $dataregisto = date_format(date_create($registo['dataregisto']),"d/m/Y");
                ?>
                <div class = "row pb-2">
                    <div class = "col-sm-2 topico-utilizador p-2 text-center">  
                        <?php echo $utilizador; ?>
                        <img src = "./assets/img/utilizador.svg" class = "img-fluid" alt = "imagem_utilizador">
                        <? echo 'Registado desde '.$dataregisto; ?>
                    </div>
                    <div class = "col-sm-10 topico-mensagem">
                        <div class = "row pb-2 pt-2 align-items-center">
                            <div class = "col-sm-8 text-left text-muted">   
                            <small id = "publicado-em">Publicado em <?php echo $datamensagem; ?></small>
                        </div>
                        <div class = "col-sm-4 text-end">
                            <a href = "./editar_mensagem.php?id_mensagem=<?php echo $idmensagem; ?>">
                                <img src = "./assets/img/editar.png" class = "img-fluid topico-icones"
                                    alt = "imagem_editar" title  =  "Editar mensagem">
                            </>
                            <a href = "./eliminar_mensagem.php?id_mensagem =<?php echo $idmensagem; ?>">
                                <img src = "./assets/img/eliminar.png" class = "img-fluid topico-icones"
                                    alt =  "imagem_eliminar" title =  "Eliminar mensagem">
                            </a>
                        </div>
                    </div>
                    <p id = "mensagem">
                        <?php echo $mensagem; ?>
                    </p>
                </div>
            </div>
            <?php
            }
            ?>
            <div class = "row pt-2">
                <div class = "col-sm-2"></div>
                <div class = "col-sm-10 text-center">
                    <form>
                        <textarea class="form-control mb-1" id="mensagem" rows="3"></textarea>
                        <button type="submit" class="btn btn-outline-success mt-1">Responder</button>
                    </form>
                </div>
            </div>
        </div>
        <?php include_once 'footer.php'; ?>
    </div>
</body> 
</html> 