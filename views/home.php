<!--FIM <nav class="navbar navbar-expand-lg bg-light">-->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col">
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
                                <form method="GET" action="<?php echo BASE_URL ?>home/index/page-1">
                                    <div class="row">
                                        <div  class="col-12 mt-2">
                                            <label for="iAutor">Autor:</label>
                                            <input type="text" id="iAutor" name="nAutor" class="form-control"/>
                                        </div>
                                        <div  class="col-12 mt-2">
                                            <label class="iTitulo">Título: </label>
                                            <input type="text" id="nTitulo" name="nTitulo" class="form-control"/>
                                        </div>
                                        <div  class="col-12 mt-2">
                                            <label for="ipalavras">Palavras-chaves:</label>
                                            <input type="text" id="ipalavras" name="nPalavras" class="form-control"/>
                                        </div>

                                        <div  class="col-6 mt-2">
                                            <label for="iAreas">Áreas de Conhecimento:</label>
                                            <select class="form-select" name="nAreas" id="iAreas">
                                                <?php
                                                if (!empty($areas_de_conhecimento)) {
                                                    echo '<option value="">Todas</option>';
                                                    foreach ($areas_de_conhecimento as $index) {
                                                        echo "<option value='" . $index['cod'] . "'> " . $index['area'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div  class="col-6 mt-2">
                                            <label for="iModaldiade">Modalidade:</label>
                                            <select class="form-select" id="iModaldiade" name="nModalidade">
                                                <?php
                                                $modalidades = array('Artigo', 'Resumo', 'Trabalho de Conclusão de Curso', 'Monografia de Especialização', 'Dissertação');
                                                echo '<option value="">Todas</option>';
                                                for ($i = 0; $i < count($modalidades); $i++) {
                                                    if (isset($cadForm['modalidade']) && $cadForm['modalidade'] == $modalidades[$i]) {
                                                        echo "<option value='" . $modalidades[$i] . "' selected='selected'> " . $modalidades[$i] . "</option>";
                                                    } else {
                                                        echo "<option value='" . $modalidades[$i] . "'> " . $modalidades[$i] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <label for="iCurso">Curso:</label>
                                            <select class="form-select" name="nCurso" id="iCurso" onchange="selectTipoTurma(this.value)">
                                                <?php
                                                if (!empty($cursos)) {
                                                    echo '<option value="">Todos</option>';
                                                    foreach ($cursos as $index) {
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
                    <?php
                    if (isset($publicacoes) && !empty($publicacoes)) :
                        foreach ($publicacoes as $index):
                            ?>
                            <div class="card mt-2 mb-2">
                                <div class="card-header">
                                    <h4 class="text-uppercase"><?php echo!empty($index['titulo']) ? $index['titulo'] : '' ?></h4>
                                </div>
                                <div class="card-body">
                                    <p class="m-0"><b>Área: </b><?php echo!empty($index['area']) ? $index['area'] : '' ?>;</p>
                                    <p class="m-0"><b>Modalidade:</b> <?php echo!empty($index['modalidade']) ? $index['modalidade'] . ";" : '' ?></p>
                                    <p class="m-0"><b>Autor(es):</b> <?php echo!empty($index['autor']) ? $index['autor'] . ";" : '' ?></p>
                                    <p class="m-0"><b>Orientador:</b> <?php echo!empty($index['orientador']) ? $index['orientador'] . ';' : '' ?></p>
                                    <p class="mb-2 mt-0"><b>Palavras-chaves:</b> <?php echo!empty($index['palavras_chave']) ? $index['palavras_chave'] : '' ?>;</p>

                                    <p class="text-justify"><b>Resumo:</b> <?php echo!empty($index['resumo']) ? substr($index['resumo'], 0, 500) : '' ?>...</p>
                                    <a  href="<?php echo BASE_URL ?>publicacao/publicacao/<?php echo $index['cod'] ?>" class="btn btn-success"> <i class="fa fa-book"></i> Ver mais</a>
                                </div>
                            </div>

                            <?php
                        endforeach;
                    else :
                        ?>
                        <div class="mt-2 mb-2 bg-danger text-white">
                            <p class="text-start p-2">Desculpe, nenhum registro foi encontrado!</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--inicio da paginação-->
            <?php
            if (ceil($paginas) > 1) {
                ?>
                <div class="col">
                    <nav aria-label="Page navigation example">
                        <ul class = "pagination">
                            <?php
                            echo "<li class='page-item'><a class='page-link' href='" . BASE_URL . "home/index/page-1" . $metodo_buscar . "'><span aria-hidden='true'>&laquo;</span></a></li>";
                            for ($p = 0; $p < ceil($paginas); $p++) {
                                if ($pagina_atual == ($p + 1)) {
                                    echo "<li class='page-item active'><a class='page-link' href='" . BASE_URL . "home/index/page-" . ($p + 1) . $metodo_buscar . "'>" . ($p + 1) . "</a></li>";
                                } else {
                                    echo "<li class='page-item'><a class='page-link' href='" . BASE_URL . "home/index/page-" . ($p + 1) . $metodo_buscar . "'>" . ($p + 1) . "</a></li>";
                                }
                            }
                            echo "<li class='page-item'><a class='page-link' href='" . BASE_URL . "home/index/page-" . ceil($paginas) . $metodo_buscar . "'>&raquo;</a></li>";
                            ?>
                        </ul>
                    </nav>
                </div> 

            <?php }
            ?>
            <!--fim da paginação-->
        </div>
        <div class=" col-md-4">
            <div class="card border-success">
                <div class="card-header bg-success text-white">
                    <h6 class="card-title m-1">TOP 10 TCC MAIS VISUALIZADOS</h6>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>