<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 bg-light">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" class="text-decoration-none"> <i class="fa fa-home"></i> Página Inícial</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none"><i class="fa fa-plus-square"></i> Cadastrar</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-add"></i> Publicação </li>
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
                    <h5 class="card-title m-2"><i class="fa fa-plus-square"></i>  Publicação</h5>
                </header>
                <article class="card-body">
                    <form class="row g-3 needs-validation" method="POST" action="<?php echo BASE_URL ?>publicacao/cadastrar" enctype="multipart/form-data" autocomplete="off"  name="nFormPublicacao">
                        <input type="hidden" name="nCod" placeholder="Exemplo: 2015" value="<?php isset($cadForm['cod']) ? $cadForm['cod'] : '' ?>"required>
                        <div class="col-md-4">
                            <label for="iArea" class="form-label">Área de Conhecimento: </label>
                            <select class="form-select" id="iArea" name="nArea" required >
                                <?php
                                if (!empty($areas_de_conhecimento)) {
                                    echo '<option selected disabled value="">Selecione a área de conhecimento</option>';
                                    foreach ($areas_de_conhecimento as $index) {
                                        if (isset($cadForm['area_cod']) && $cadForm['area_cod'] == $index['cod']) {
                                            echo "<option value='" . $index['cod'] . "' selected='selected'> " . $index['area'] . "</option>";
                                        } else {
                                            echo "<option value='" . $index['cod'] . "'> " . $index['area'] . "</option>";
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Informe a área de conhecimento
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="iModaldiade" class="form-label">Modalidade: </label>
                            <select class="form-select" id="iModaldiade" name="nModalidade" required >
                                <?php
                                $modalidades = array('Artigo', 'Resumo', 'Trabalho de Conclusão de Curso', 'Monografia de Especialização', 'Dissertação');
                                echo '<option selected disabled value="">Selecione a turma</option>';
                                for ($i = 0; $i < count($modalidades); $i++) {
                                    if (isset($cadForm['modalidade']) && $cadForm['modalidade'] == $modalidades[$i]) {
                                        echo "<option value='" . $modalidades[$i] . "' selected='selected'> " . $modalidades[$i] . "</option>";
                                    } else {
                                        echo "<option value='" . $modalidades[$i] . "'> " . $modalidades[$i] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Informe a modalidade
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="iTurma" class="form-label">Turma: </label>
                            <select class="form-select" id="iTurma" name="nTurma" required >
                                <?php
                                if (!empty($turmas)) {
                                    echo '<option selected disabled value="">Selecione a turma</option>';
                                    foreach ($turmas as $index) {
                                        if (isset($cadForm['turma_cod']) && $cadForm['turma_cod'] == $index['cod']) {
                                            echo "<option value='" . $index['cod'] . "' selected='selected'> " . $index['turma'] . " - " . $index['curso'] . "</option>";
                                        } else {
                                            echo "<option value='" . $index['cod'] . "'> " . $index['turma'] . " - " . $index['curso'] . "</option>";
                                        }
                                    }
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Informe a turma
                            </div>
                        </div>

                        <div class="col-md-9">
                            <label for="iNome" class="form-label">Título:</label>
                            <input type="text" class="form-control" id="iTitulo" name= "nTitulo" placeholder="Exemplo: SISTEMA DE INFORMAÇÃO GERENCIAL À COOPERTATIVA DOS TAXISTAS DE ITAITUBA (COOTAX)" value="<?php isset($cadForm['titulo']) ? $cadForm['titulo'] : '' ?>" required>
                            <div class="invalid-feedback">
                                Informe o título
                            </div>
                        </div>                        
                        <div class="col-md-3">
                            <label for="idata" class="form-label">Ano da publicação:</label>
                            <input type="text" class="form-control" id="idata" name="nData" placeholder="Exemplo: 2018" value="<?php isset($cadForm['data']) ? $this->formatDateView($cadForm['data']) : '' ?>"required>
                            <div class="invalid-feedback">
                                Informe o ano da publicação
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="iAutor" class="form-label">Autor:</label>
                            <input type="text" class="form-control" id="iAutor" name= "nAutor" placeholder="Exemplo: Joab Torres Alencar" value="<?php isset($cadForm['autor']) ? $cadForm['autor'] : '' ?>" required>
                            <div class="invalid-feedback">
                                Informe o autor
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="iOrientador" class="form-label">Orientador(a):</label>
                            <input type="text" class="form-control" id="iOrientador" name="nOrientador" placeholder="Exemplo: Diego da Silva Smith" value="<?php isset($cadForm['orientador']) ? $cadForm['orientador'] : '' ?>"required>
                            <div class="invalid-feedback">
                                Informe o/a orientador(a)
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="iCoorientador" class="form-label">Coorientador(a):</label>
                            <input type="text" class="form-control" id="iCoorientador" name="nCoorientador" placeholder="Exemplo: José Rodrigo Alves Amaral" value="<?php isset($cadForm['coorientador']) ? $cadForm['coorientador'] : '' ?>">
                            <div class="invalid-feedback">
                                Informe o/a coorientador(a)
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="iMembro_1" class="form-label">Avaliador(a)¹:</label>
                            <input type="text" class="form-control" id="iMembro_1" name="nMembro_1" placeholder="Exemplo: José Ribamar Azevedo dos Santos" value="<?php isset($cadForm['membro_1']) ? $cadForm['membro_1'] : '' ?>"required>
                            <div class="invalid-feedback">
                                Informe o/a Avaliador(a)¹
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="imembro_2" class="form-label">Avaliador(a)²:</label>
                            <input type="text" class="form-control" id="imembro_2" name="nMembro_2" placeholder="Exemplo: Vilma Ribeiro de Almeida" value="<?php isset($cadForm['membro_2']) ? $cadForm['membro_2'] : '' ?>"required>
                            <div class="invalid-feedback">
                                Informe o/a Avaliador(a)²
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="iReferencia" class="form-label">Referência de citação:</label>
                            <textarea class="form-control"  name="nReferencia" rows="5"id="iReferencia" placeholder="Exemplo: ALENCAR, Joab Torres. Sistema de informação gerencial à cooperativa dos taxistas de Itaituba - COOTAX. Orientador: Prof. Me. Diego da Silva Smith. 2019. 118 f. Trabalho de Conclusão de Curso (Graduação em Tecnologia em Análise e Desenvolvimento de Sistemas) — Instituto Federal de Educação, Ciência e Tecnologia do Pará – IFPA. Campus Itaituba, 2019." required><?php isset($cadForm['referencia']) ? $cadForm['referencia'] : '' ?></textarea>
                            <div class="invalid-feedback">
                                Informe a referência de citação
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="iResumo" class="form-label">Resumo:</label>
                            <textarea class="form-control" name="nResumo" id="iResumo" rows="10" name="nResumo" placeholder="Exemplo: Diante do elevado nível de competitividade no campo econômico, em função do processo de mudanças aceleradas com avanços tecnológicos e disseminação do uso de sistemas de informação gerencial, está realidade tem levado as cooperativas à necessidade primária de desenvolver mecanismos que assegurem a sua sustentabilidade no mercado...." required><?php isset($cadForm['resumo']) ? $cadForm['resumo'] : '' ?></textarea>
                            <div class="invalid-feedback">
                                Informe o resumo
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="chave" class="form-label">Palavras-chave:</label>
                            <input type="text" class="form-control" id="iPalavras-chave" name="nPalavras" placeholder="Exemplo: Tecnologia da Informação; Sistema de Informação; Cooperativas; Cooperativismo." value="<?php isset($cadForm['palavras_chave']) ? $cadForm['palavras_chave'] : '' ?>"required>
                            <div class="invalid-feedback">
                                informe as palavras-chave
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="iAbstract" class="form-label">Abstract:</label>
                            <textarea class="form-control" id="iAbstract" rows="10" name="nAbstract" placeholder="Exemplo: Given the high level of competitiveness in the economic field, due to the process of accelerated changes with technological advances and dissemination of the use of management information systems, this reality has led cooperatives to the primary need to develop mechanisms to ensure their sustainability in the market..." required><?php isset($cadForm['abstract']) ? $cadForm['abstract'] : '' ?></textarea>
                            <div class="invalid-feedback">
                                Informe o abstract
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="ikeywords" class="form-label">Keywords:</label>
                            <input type="text" class="form-control" id="ikeywords" name="nKeywords" placeholder="Exemplo: Information Technology; Information System; Cooperatives; Cooperativism." value="<?php isset($cadForm['keywords']) ? $cadForm['keywords'] : '' ?>"required>
                            <div class="invalid-feedback">
                                informe as keywords
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="iarquivo" class="form-label">Arquivo: <small class="bg-danger text-white p-1">Recomenda-se que o arquivo esteja na extensão em PDF, com tamanho o máximo de 20 MB (megabyte)</small></label>
                            <input type="hidden" name="nFileEnviado"  value="<?php echo isset($chamado['anexo']) ? $chamado['anexo'] : null; ?>"/>
                            <div class="mb-3">
                                <input type="file" class="form-control" id="iarquivo"  name="nFile" aria-label="file example" required>
                                <div class="invalid-feedback">Adicione o arquivo</div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col">
                                <button class="btn btn-success" name="nSalvar" value="Salvar" onclick="valida_nFormPublicacao()" type="submit"><i class="fa fa-check-circle" aria-hidden="true"></i> Salvar</button>
                                <a href="<?php echo BASE_URL ?>home" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</a>
                            </div>
                        </div>
                    </form>
                </article>
            </section>
        </div>
    </div>
</div>