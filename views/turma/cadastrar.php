<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 bg-light">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" class="text-decoration-none"> <i class="fa fa-home"></i> Página Inícial</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none"><i class="fa fa-plus-square"></i> Cadastrar</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-add"></i> Turma </li>
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
                    <h5 class="card-title m-2"><i class="fa fa-plus-square"></i>  Turma</h5>
                </header>
                <article class="card-body">
                    <form class="row g-3 needs-validation" method="POST" action="<?php echo BASE_URL ?>turma/cadastrar" enctype="multipart/form-data" autocomplete="off"  name="nFormTurma">
                        <input type="hidden" name="nCod" placeholder="Exemplo: 2015" value="<?php echo isset($cadForm['cod']) ? $cadForm['cod'] : '' ?>"required>
                        <div class="col-md-4">
                            <label for="iCurso" class="form-label">Curso: </label>
                            <select class="form-select" id="iCurso" name="nCurso" required >
                                <?php
                                if (!empty($cursos)) {
                                    echo '<option selected disabled value="">Selecione o curso</option>';
                                    foreach ($cursos as $index) {
                                        if (isset($cadForm['curso_cod']) && $cadForm['curso_cod'] == $index['cod']) {
                                            echo "<option value='" . $index['cod'] . "' selected='selected'> " . $index['curso'] . "</option>";
                                        } else {
                                            echo "<option value='" . $index['cod'] . "'> " . $index['curso'] . "</option>";
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Informe o curso
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="iTurma" class="form-label">Nome da turma:</label>
                            <input type="text" class="form-control" id="iTurma" name= "nTurma" placeholder="Exemplo: TADS15" value="<?php echo isset($cadForm['turma']) ? $cadForm['turma'] : '' ?>" required>
                            <div class="invalid-feedback">
                                Informe a turma
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="iAno" class="form-label">Ano da turma:</label>
                            <input type="text" class="form-control" id="iAno" name="nAno" placeholder="Exemplo: 2015" value="<?php echo isset($cadForm['ano']) ? $cadForm['ano'] : '' ?>"required>
                            <div class="invalid-feedback">
                                Informe o ano da turma
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col">
                                <button class="btn btn-success" name="nSalvar" value="Salvar" onclick="valida_nFormTurma()" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                                <a href="<?php echo BASE_URL ?>home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                            </div>
                        </div>
                    </form>
                </article>
            </section>
        </div>
    </div>
</div>