<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 bg-light">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" class="text-decoration-none"> <i class="fa fa-home"></i> Página Inícial</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>usuario/consultar" class="text-decoration-none"> <i class="fa fa-search"></i> Consultar Usuários</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-edit"></i> Usuário </li>
                </ol>
            </nav>
        </div>

        <div class="col-12">
            <div class="alert alert-dismissible fade show <?php echo (isset($erro['class'])) ? $erro['class'] : 'alert-warning'; ?> " role="alert" id="alert-msg">
                <div id="resposta"><?php echo (isset($erro['msg'])) ? $erro['msg'] : '<i class="fa fa-info-circle" aria-hidden="true"></i> Preencha os campos corretamente.'; ?></div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <div class="col-12 mt-1">
            <section class="card bg-light">
                <header class="card-header bg-success text-white">
                    <h5 class="card-title m-2"><i class="fa fa-edit"></i>  Usuário</h5>
                </header>
                <article class="card-body">
                    <form class="row g-3 needs-validation" method="POST" action="<?php echo BASE_URL ?>usuario/editar/<?php echo $cadForm['cod'] ?>" enctype="multipart/form-data" autocomplete="off"  name="nFormUsuario">
                        <input type="hidden" name="nCod" placeholder="Exemplo: 2015" value="<?php echo isset($cadForm['cod']) ? $cadForm['cod'] : '' ?>"required>
                        <div class="col-md-4">
                            <label for="iNome" class="form-label">Nome Completo:</label>
                            <input type="text" class="form-control" id="iNome" name= "nNome" placeholder="Exemplo: João Garcia" value="<?php echo isset($cadForm['nome']) ? $cadForm['nome'] : '' ?>" required>
                            <div class="invalid-feedback">
                                Informe o nome
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="iEmail" class="form-label">E-mail:</label>
                            <input type="email" class="form-control" id="iEmail" name= "nEmail" placeholder="Exemplo: joao.garcia@gmail.com" value="<?php echo isset($cadForm['email']) ? $cadForm['email'] : '' ?>" required>
                            <div class="invalid-feedback">
                                Informe o e-mail
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="iSenha" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="iSenha" name="nSenha" placeholder="Exemplo: *********" >
                            <div class="invalid-feedback">
                                Informe a senha
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col">
                                <button class="btn btn-success" name="nSalvar" value="Salvar" onclick="valida_nFormUsuario()" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                                <a href="<?php echo BASE_URL ?>home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                            </div>
                        </div>
                    </form>
                </article>
            </section>
        </div>
    </div>
</div>