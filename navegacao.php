<?php
include_once('verificar_sessao.php');
?>
<nav class="navbar bg-navegacao rounded">
    <div class="container-fluid">
        <span>Bem-vindo, <i><?php echo $_SESSION['utilizador']; ?></i></span>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Opções</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            <div class="offcanvas-body">
                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Pesquisar tópicos">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role=  "button" data-bs-toggle="dropdown">
                            Administração
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="criar_utilizador.php">Criar utilizador</a></li>
                            <li><a class="dropdown-item" href="utilizadores.php">Ver utilizadores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="criar_topico.php">Criar tópico</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="topicos.php">Ver tópico</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil.php">Editar perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="terminar.php">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
