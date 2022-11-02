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