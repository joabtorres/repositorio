<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo NAME_PROJECT ?></title>
        <link href="<?php echo BASE_URL ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo BASE_URL ?>assets/css/login.css" rel="stylesheet">
        <script src="<?php echo BASE_URL ?>assets/js/bootstrap.bundle.min.js"></script>
        <link href="<?php echo BASE_URL ?>assets/css/fontawesome.min.css" rel="stylesheet">
        <link href="<?php echo BASE_URL ?>assets/css/brands.min.css" rel="stylesheet">
        <link href="<?php echo BASE_URL ?>assets/css/solid.min.css" rel="stylesheet">
    </head>
    <body>
        <form class="form-signin" method="post">
            <h4 class="text-center pt-2 pb-2"><?php echo NAME_PROJECT ?></h4>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                <input type="text" class="form-control" placeholder="Exemplo: joao.carlos@gmail.com" name="nEmail" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                <input type="password" class="form-control" placeholder="Exemplo: *******" name="nSenha" aria-label="Password" aria-describedby="basic-addon2">
            </div>
            <?php if (isset($mensagem) && !empty($mensagem)) : ?>
                <span class="p-2 mb-3 bg-danger text-white d-block"><i class="fa fa-info-circle"></i> <?php echo $mensagem?></span>
            <?php endif ?>
            <div class="d-grid">
                <button type="submit" class="btn btn-success" name="nEntrar"> <i class=" fa fa-sign-in-alt"></i> Fazer Login</button>
            </div>
        </form>
    </body>
</html>