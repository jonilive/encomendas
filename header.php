<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title><?php echo $SYSTEM_NAME;?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo $SYSTEM_URL;?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $SYSTEM_URL;?>lib/DataTables/datatables.min.css"/>
    <link rel="stylesheet" href="<?php echo $SYSTEM_URL;?>lib/fontawesome-free-5.12.0-web/css/all.css"/>
    <link rel="icon" href="<?php echo $SYSTEM_URL;?>favicon.ico" />

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* Show it is fixed to the top */
        body {
            padding-top: 4.5rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="./"><i class="fas fa-cubes"></i> <?php echo $SYSTEM_NAME;?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php echo $SYSTEM_ACTIVEURL == "home" ? "active" : "";?>">
                    <a class="nav-link" href="<?php echo $SYSTEM_URL;?>">Encomendas</a>
                </li>
                <li class="nav-item <?php echo $SYSTEM_ACTIVEURL == "nova" ? "active" : "";?>">
                    <a class="nav-link" href="<?php echo $SYSTEM_URL;?>?nova">Nova encomenda</a>
                </li>
                <li class="nav-item dropdown <?php echo $SYSTEM_ACTIVEURL == "outros" ? "active" : ""; ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Outras ações</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="<?php echo $SYSTEM_URL; ?>?listafornecedores">Criar listagem para fornecedor</a>
                        <a class="dropdown-item" href="<?php echo $SYSTEM_URL; ?>?entradas">Entradas</a>
                    </div>
                </li>
                <?php if($_SESSION['loggedin']['nivel'] < 2){ ?>

                <li class="nav-item <?php echo $SYSTEM_ACTIVEURL == "fornecedores" ? "active" : "";?>">
                    <a class="nav-link" href="<?php echo $SYSTEM_URL;?>?fornecedores">Fornecedores</a>
                </li>

                <?php } ?>
            </ul>
            <div class="form-inline mt-2 mt-md-0">
                <span class="mr-sm-2 text-secondary">Olá <?php echo $_SESSION['loggedin']['nome'];?>, </span>
                <a class="btn btn-outline-danger my-2 my-sm-0 text-danger" href="<?php echo $SYSTEM_URL;?>?logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
            </div>
        </div>
    </nav>