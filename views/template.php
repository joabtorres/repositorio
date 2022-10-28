<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo NAME_PROJECT ?></title>
        <link href="<?php echo BASE_URL ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <script src="<?php echo BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>
        <link href="<?php echo BASE_URL ?>assets/css/fontawesome.min.css" rel="stylesheet">
        <link href="<?php echo BASE_URL ?>assets/css/brands.min.css" rel="stylesheet">
        <link href="<?php echo BASE_URL ?>assets/css/solid.min.css" rel="stylesheet">
    </head>
    <body>
        <!--<nav class="navbar navbar-expand-lg bg-light">-->

        <nav class="navbar navbar-expand-lg  navbar-dark bg-success">
            <div class="container">
                <a class="navbar-brand d-sm-none d-md-block" href="<?php echo BASE_URL ?>">Repositório de TCC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 me-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL ?>"> <i class="fa fa-home"></i> Página Inicial</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-plus-square"></i> Cadastrar
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Solicitação de publicação</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Solicitação de correção de publicação</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Solicitação de remoção de publicação</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-search"></i> Consultar
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Solicitação de publicação</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Solicitação de correção de publicação</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Solicitação de remoção de publicação</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-download"></i> Documentos
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Solicitação de publicação</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Solicitação de correção de publicação</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Solicitação de remoção de publicação</a></li>
                            </ul>
                        </li>   
                        <li class="nav-item d-sm-none d-md-block">
                            <a class="nav-link" aria-current="page" href="<?php echo BASE_URL ?>login"> <i class="fa fa-user-lock"> </i> Acesso restrito</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <?php $this->loadViewInTemplate($viewName, $viewData) ?>

    </body>
</html>