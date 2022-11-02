<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 bg-light">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" class="text-decoration-none"> <i class="fa fa-home"></i> Página Inícial</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-search"></i> Consultar Turmas </li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card border-success">
                <div class="card-header bg-success text-white">
                    <a class="text-decoration-none text-white" data-bs-toggle="collapse" href="#PainelDeBusca" role="button">
                        <h6 class="m-1">
                            Painel de buscar <i class="fa fa-search float-end"></i>
                        </h6>
                    </a>
                </div>
                <div  class="collapse" id="PainelDeBusca">
                    <div class="card-body">
                        <form method="GET" action="<?php echo BASE_URL ?>turma/consultar/page-1">
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <label for="iCurso">Curso:</label>
                                    <select class="form-select" name="nCurso" id="iCurso" onchange="selectTipoTurma(this.value)">
                                        <?php
                                        if (!empty($cursoss)) {
                                            echo '<option value="">Todos</option>';
                                            foreach ($cursoss as $index) {
                                                echo "<option value='" . $index['cod'] . "'> " . $index['curso'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6 mt-2">
                                    <label for="iTurma">Turma:</label>
                                    <select class="form-select" name="nTurma" id="iTurma">
                                        <?php
                                        if (!empty($turmas)) {
                                            echo '<option value="">Todas</option>';
                                            foreach ($turmas as $index) {
                                                echo "<option value='" . $index['cod'] . "'> " . $index['turma'] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 mt-2">
                                    <button class="btn btn-success mt-3" name="nBuscar" value="Buscar"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($cursos) && !empty($cursos)):
            foreach ($cursos as $index):
                ?>
                <div class="col-12 mt-2">
                    <section class="card">
                        <header class="card-header">
                            <h4 class="card-title mt-1 mb-1">Curso: <?php echo!empty($index['curso']) ? $index['curso'] : '' ?></h4>
                        </header>
                        <article class="card-body p-0">
                            <table class="table m-0 table-striped table-bordered">
                                <tr class="bg-dark">
                                    <th class="text-white" width="150px">Turma</th>
                                    <th class="text-white">Total de publicações realizadas</th>
                                    <th class="text-white" width='90px'>Ação</th>
                                </tr>
                                <?php
                                if (isset($index['turmas']) && !empty($index['turmas'])):
                                    foreach ($index['turmas'] as $index2):
                                        ?>
                                        <tr>
                                            <td><?php echo!empty($index2['turma']) ? $index2['turma'] : '' ?></td>
                                            <td><?php echo!empty($index2['data']) ? $index2['data'] : '0' ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" title="Editar" href="<?php echo BASE_URL ?>turma/editar/<?php echo!empty($index2['cod']) ? $index2['cod'] : 0 ?>"><i class="fa fa-edit"></i></a>
                                                <button type="button"  class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal_relatorio_<?php echo $index2['cod'] ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        <?php
                                    endforeach;
                                endif;
                                ?>  
                            </table>
                        </article>
                    </section>
                </div>

                <?php
            endforeach;
        else:
            ?>
            <!--<div class="col mt-2 mb-2">-->
            <div class="col mt-2 mb-2">
                <div class="alert alert-danger " role="alert" id="alert-msg">
                    <button class="close" data-hide="alert">&times;</button>
                    <div id="resposta"> <i class="fa fa-times"></i> Desculpe, não foi possível localizar nenhum registro !</div>
                </div>
            </div>
            <!--<div class="col mt-2 mb-2">-->
        <?php endif; ?>
    </div>
</div>
<?php
if (isset($cursos) && is_array($cursos)) :
    foreach ($cursos as $index) :
        if (isset($index['turmas']) && !empty($index['turmas'])):
            foreach ($index['turmas'] as $indice):
                ?>        
                <!--MODAL - ESTRUTURA BÁSICA-->
                <section class="modal fade" id="modal_relatorio_<?php echo $indice['cod'] ?>" tabindex="-1" aria-labelledby="modal_relatorio_<?php echo $indice['cod'] ?>" aria-hidden="true">
                    <article class="modal-dialog modal-md modal-dialog-centered" role="document">
                        <section class="modal-content">
                            <header class="modal-header bg-danger text-white">
                                <h5 class="modal-title">Deseja remover este registro?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </header>
                            <article class="modal-body">
                                <ul class="list-unstyled">
                                    <li><b>Cod: </b> <?php echo!empty($indice['cod']) ? $indice['cod'] : '' ?>;</li>
                                    <li><b>Turma: </b> <?php echo!empty($indice['turma']) ? $indice['turma'] : '' ?>;</li>
                                    <li><b>Total de publicações realizadas: </b> <?php echo!empty($indice['data']) ? $indice['data'] : '0' ?>.</li>
                                </ul>
                                <p class="text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro e todos registos relacionados ao mesmo deixaram de existir no sistema.</p>
                            </article>
                            <footer class="modal-footer">
                                <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . 'turma/excluir/' . $indice['cod'] ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                                <button class="btn btn-default" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                            </footer>
                        </section>
                    </article>
                </section>
                <?php
            endforeach;
        endif;
    endforeach;
endif;
?>