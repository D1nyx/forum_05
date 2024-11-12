
<?php
    include_once 'verificar_sessao.php';
    include_once 'bd.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórum05</title>
    <?php require_once 'metadados.php';?> 
</head>
<body>
    <div class="container">
        <?php include_once 'header.php'; ?>
        <?php include_once 'navegacao.php'; ?>
        <table class="table table-sm table-stripped table-hover table-bordered mt-2">
            <thead class="px-3">
                <tr>
                    <th scope="col">Tópicos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql ='SELECT idtopico, titulo, datatopico, idutilizador, utilizador';
                $sql .=' FROM t_topico JOIN t_utilizador ON';
                $sql .=' t_topico.refidutilizador = t_utilizador.idutilizador';
                $sql .=' ORDER BY titulo ASC';
                $rs = consultarBD($sql);
                foreach ($rs as $registo) {
                    $id_topico = $registo['idtopico'];
                    $titulo = $registo['titulo'];
                    $datatopico = date_format(date_create($registo['datatopico']),"d/m/Y H:i:s");
                    $idutilizador = $registo['idutilizador'];
                    $utilizador = $registo['utilizador'];  
                ?>
                <tr>
                    <td class="p-2">
                        <p>
                            <a class="link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="topico.php?id_topico=<?php echo $id_topico; ?>">
                                <?php echo $titulo; ?>
                            </a>
                        </p>
                        <p class="fw-light datas text-end pb-0">
                            Publicado por <?php echo $utilizador; ?> em <?php echo $datatopico; ?>
                        </p>
                    </td>  
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php include_once 'footer.php'; ?>
    </div>
</body>
</html>