

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require_once 'metadados.php';?> 
</head>
<body>

  <div class="container">
    <?php include_once 'header.php';?>
    <form action="./validar.php" method="POST">
      <div class="row text-center my-1">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 my-3">

          <input type="text" class="form-control my-1 fw-light" id="username" name='username' placeholder="Digite o seu nome de utilizador" required>
          
          <input type="password" class="form-control my-1 fw-light" id="password" name='password' placeholder="Digite a sua palavra passe" required>
          
          <?php 
            session_start();
            if( isset($_SESSION['erro'])){
              $str = '<div class="alert alert-danger py-1 my-0" role="alert">';
              $str .= $_SESSION['erro'].'</div>';
              echo $str;
              unset($_SESSION['erro']);
            }
          ?>
          
          <button type="submit" class="btn btn-outline-success my-1">Entrar</button>

        </div>
        <div class="col-sm-2"></div>
      </div>
    </form>
    <?php include_once 'footer.php'; ?>
  </div>
</body>
</html>