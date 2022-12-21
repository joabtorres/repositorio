<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 bg-light">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" class="text-decoration-none"> <i class="fa fa-home"></i> Página Inícial</a></li>
                    <li class="breadcrumb-item active" aria-current="page">  Publicação </li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <?php if ($this->checkUser()): ?>
                <p class="text-end">
                    <a class="btn btn-primary btn-sm" href="<?php echo BASE_URL . 'publicacao/editar/' . $publicacao['cod'] ?>" title="Editar"><i class="fa fa-edit"></i> Editar</a>
                    <button type="button"  class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal_relatorio_<?php echo $publicacao['cod'] ?>" title="Excluir"><i class="fa fa-trash"></i> Excluir</button>
                </p>
            <?php endif; ?>
            <table class="table">
                <tr>
                    <td class="bg-light" width="200px">Título: </td>
                    <td><?php echo!empty($publicacao['titulo']) ? $publicacao['titulo'] : ''; ?>.</td>
                </tr>
                <tr>
                    <td class="bg-light" width="200px">Autor(es): </td>
                    <td><?php echo!empty($publicacao['autor']) ? $publicacao['autor'] : ''; ?>.</td>
                </tr>

                <tr>
                    <td class="bg-light" width="200px">Orientador: </td>
                    <td><?php echo!empty($publicacao['orientador']) ? $publicacao['orientador'] : ''; ?>.</td>
                </tr>
                <?php if (!empty($publicacao['coorientador'])) : ?>
                    <tr>
                        <td class="bg-light" width="200px">Coorientador: </td>
                        <td><?php echo!empty($publicacao['coorientador']) ? $publicacao['coorientador'] : ''; ?>.</td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td class="bg-light" width="200px">Avaliadores: </td>
                    <td><?php echo!empty($publicacao['membro_1']) ? $publicacao['membro_1'] : ''; ?>; <?php echo!empty($publicacao['membro_2']) ? $publicacao['membro_2'] : ''; ?>.</td>
                </tr>
                <tr>
                    <td class="bg-light" width="200px">Área de Conhecimento: </td>
                    <td><?php echo!empty($publicacao['area']) ? $publicacao['area'] : ''; ?>.</td>
                </tr>
                <tr>
                    <td class="bg-light" width="200px">Modalidade: </td>
                    <td><?php echo!empty($publicacao['modalidade']) ? $publicacao['modalidade'] : ''; ?>.</td>
                </tr>
                <tr>
                    <td class="bg-light" width="200px">Turma - Curso: </td>
                    <td><?php echo!empty($publicacao['turma']) ? $publicacao['turma'] . ' - ' . $publicacao['curso'] : ''; ?>.</td>
                </tr>

                <tr>
                    <td class="bg-light" width="200px">Referência: </td>
                    <td class="text-justify"><?php echo!empty($publicacao['referencia']) ? $publicacao['referencia'] : ''; ?></td>
                </tr>
                <tr>
                    <td class="bg-light" width="200px">Resumo: </td>
                    <td class="text-justify"><?php echo!empty($publicacao['resumo']) ? $publicacao['resumo'] : ''; ?></td>
                </tr>
                <tr>
                    <td class="bg-light" width="200px">Palavras-chave: </td>
                    <td class="text-justify"><?php echo!empty($publicacao['palavras_chave']) ? $publicacao['palavras_chave'] : ''; ?></td>
                </tr>
                <tr>
                    <td class="bg-light" width="200px">Abstract: </td>
                    <td class="text-justify"><?php echo!empty($publicacao['abstract']) ? $publicacao['abstract'] : ''; ?></td>
                </tr>
                <tr>
                    <td class="bg-light" width="200px">Keywords: </td>
                    <td class="text-justify"><?php echo!empty($publicacao['keywords']) ? $publicacao['keywords'] : ''; ?></td>
                </tr>
                <tr>
                    <td class="bg-light" width="200px">Arquivo: </td>
                    <td class="text-justify"><a class="btn btn-outline-primary btn-sm" target="_blank" href="<?php echo!empty($publicacao['arquivo']) ? BASE_URL . $publicacao['arquivo'] : ''; ?>"><i class="fa fa-download"></i> <?php echo $this->showFileName($publicacao['arquivo']) ?></a></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php
if ($this->checkUser()):
    if (isset($publicacao) && is_array($publicacao)) :
        ?>        
        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_relatorio_<?php echo $publicacao['cod'] ?>" tabindex="-1" aria-labelledby="modal_relatorio_<?php echo $publicacao['cod'] ?>" aria-hidden="true">
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
                            <li><b>Cod: </b> <?php echo!empty($publicacao['cod']) ? $publicacao['cod'] : '' ?>;</li>
                            <li><b>Turma: </b> <?php echo!empty($publicacao['turma']) ? $publicacao['turma'] : '' ?>;</li>
                            <li><b>Titulo: </b> <?php echo!empty($publicacao['titulo']) ? $publicacao['titulo'] : '0' ?>;</li>
                            <li><b>Autor(es): </b> <?php echo!empty($publicacao['autor']) ? $publicacao['autor'] : '0' ?>;</li>
                            <li><b>Orientador(a): </b> <?php echo!empty($publicacao['orientador']) ? $publicacao['orientador'] : '0' ?>.</li>
                        </ul>
                        <p class="text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro e todos registos relacionados ao mesmo deixaram de existir no sistema.</p>
                    </article>
                    <footer class="modal-footer">
                        <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . 'publicacao/excluir/' . $publicacao['cod'] ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                        <button class="btn btn-default" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    </footer>
                </section>
            </article>
        </section>
        <?php
    endif;
endif;
?>