<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mendoza</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
    <?php
        if (isset($_GET["views"])) {
            $ruta = explode("/", $_GET["views"]);
        }
    ?>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        
        <!-- Icono agregado en el brand -->
        <a class="navbar-brand" href="#">
            <i class="bi bi-person-circle"></i> bet
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Menú izquierda -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item"><a class="nav-link active" href="#">
                    <i class="bi bi-house-door"></i> Home
                </a></li>

                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>users">
                    <i class="bi bi-people"></i> Users
                </a></li>

                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>products">
                    <i class="bi bi-box-seam"></i> Products
                </a></li>

                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>category">
                    <i class="bi bi-tags"></i> Categories
                </a></li>

                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>clients">
                    <i class="bi bi-person-lines-fill"></i> Clients
                </a></li>

                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>providers">
                    <i class="bi bi-truck"></i> Providers
                </a></li>

                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>shoops">
                    <i class="bi bi-shop"></i> Shoops
                </a></li>

                <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>shoops">
                    <i class="bi bi-cash-stack"></i> Sales
                </a></li>

            </ul>

            <!-- Dropdown alineado a la derecha -->
            <form class="d-flex ms-auto">
                <ul class="navbar-nav px-4">
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> Cuenta
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li><a class="dropdown-item" href="#">
                                <i class="bi bi-person"></i> Perfil
                            </a></li>

                            <li><hr class="dropdown-divider"></li>

                            <li><a class="dropdown-item" href="#">
                                <i class="bi bi-box-arrow-right"></i> Logo
                            </a></li>

                        </ul>
                    </li>
                </ul>
            </form>

        </div>
    </div>
</nav>
