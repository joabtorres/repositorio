<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/gif" href="<?php echo BASE_URL ?>assets/imagens/icon.png" sizes="32x32" />
        <meta property="ogg:title" content="<?php echo NAME_PROJECT ?>">
        <meta property="ogg:description" content="<?php echo NAME_PROJECT ?>">
        <title><?php echo NAME_PROJECT ?></title>
        <link href="<?php echo BASE_URL ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo BASE_URL ?>assets/css/estilo.css" rel="stylesheet">
        <script src="<?php echo BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>
        <link href="<?php echo BASE_URL ?>assets/css/fontawesome.min.css" rel="stylesheet">
        <link href="<?php echo BASE_URL ?>assets/css/brands.min.css" rel="stylesheet">
        <link href="<?php echo BASE_URL ?>assets/css/solid.min.css" rel="stylesheet">
        <?php echo '<script> var base_url = "' . BASE_URL . '"</script>' ?>
    </head>
    <body>
        <!--<nav class="navbar navbar-expand-lg bg-light">-->
        <div class="bg-success">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-3 mb-3">
                        <img src="<?php echo BASE_URL ?>assets/imagens/logo.png" width="400px"/>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand d-sm-block d-md-none" href="<?php echo BASE_URL ?>">Repositório Institucional</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 me-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL ?>"> <i class="fa fa-home"></i> Página Inicial</a>
                        </li>
                        <?php if ($this->checkUser() != null) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-plus-square"></i> Cadastrar
                                </a>
                                <ul class="dropdown-menu ">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . 'turma/cadastrar' ?>"> <i class="fa fa-add"></i> Turma</a></li>
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . 'publicacao/cadastrar' ?>"> <i class="fa fa-add"></i> Publicação</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL . 'usuario/cadastrar' ?>"> <i class="fa fa-add"></i> Usuário</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-search"></i> Consultar
                                </a>
                                <ul class="dropdown-menu ">
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL?>turma/consultar"> <i class="fa fa-search"></i> Turmas</a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="fa fa-search"></i> Solicitação de correção de publicação</a></li>
                                    <li><a class="dropdown-item" href="#"> <i class="fa fa-search"></i>Solicitação de remoção de publicação</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-download"></i> Documentos
                            </a>
                            <ul class="dropdown-menu ">
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Solicitação de publicação</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Solicitação de correção de publicação</a></li>
                                <li><a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Solicitação de remoção de publicação</a></li>
                            </ul>
                        </li>   
                        <li class="nav-item d-sm-none d-md-block">
                            <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL ?>login"> <i class="fa fa-user-lock"> </i> Acesso restrito</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <?php $this->loadViewInTemplate($viewName, $viewData) ?>
        <div class="container mt-3">
            <div class="row">
                <div class="col">
                    <hr class="m-0">
                    <p class="text-end">
                        &copy; Copyright 2022
                    </p>
                </div>
            </div>
        </div>
        <script src="<?php echo BASE_URL ?>assets/js/script.js"></script>
    </body>
</html>