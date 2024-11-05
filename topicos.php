
<?php
    include_once 'verificar_sessao.php';
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
                for ($i =0; $i < 20; $i++) {
                    $id_topico = $i+1;
                ?>
                <tr>
                    <td class="p-2">
                        <p>
                            <a class="link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover" href="topico.php?id_topico=<?php echo $id_topico; ?>">
                                Título do Tópico <?php echo $id_topico; ?>
                            </a>
                        </p>
                        <p class="fw-light datas text-end pb-0">
                            Publicado por autor_do_topico em 01/01/2000
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