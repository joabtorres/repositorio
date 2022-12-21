<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 bg-light">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL ?>" class="text-decoration-none"> <i class="fa fa-home"></i> Página Inícial</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-search"></i> Consultar Usuários </li>
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
                        <form method="GET" action="<?php echo BASE_URL ?>usuario/consultar/page-1">
                            <div class="row">
                                <div class="col-6 mt-2">
                                    <label for="iPor">Por:</label>
                                    <select class="form-select" name="nPor" id="iPor" >
                                        <option value="Nome">Nome</option>
                                        <option value="Email">Email</option>
                                    </select>
                                </div>
                                <div class="col-6 mt-2">
                                    <label for="icampo">Campo:</label>
                                    <input type="text" class="form-control" name='nCampo' id='icampo'/>
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
        if (isset($usuarios) && !empty($usuarios)):
            ?>
            <div class="col-12 mt-2">
                <section class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-1 mb-1"><i class="fa fa-users"></i> Usuários</h4>
                    </header>
                    <article class="card-body p-0">
                        <table class="table m-0 table-striped table-bordered">
                            <tr class="bg-dark">
                                <th class="text-white">Nome</th>
                                <th class="text-white">E-mail</th>
                                <th class="text-white" width='90px'>Ação</th>
                            </tr>
                            <?php
                            foreach ($usuarios as $index):
                                ?>
                                <tr>
                                    <td><?php echo!empty($index['nome']) ? $index['nome'] : '' ?></td>
                                    <td><?php echo!empty($index['email']) ? $index['email'] : '0' ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" title="Editar" href="<?php echo BASE_URL ?>usuario/editar/<?php echo!empty($index['cod']) ? $index['cod'] : 0 ?>"><i class="fa fa-edit"></i></a>
                                        <button type="button"  class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal_de_exclusao_<?php echo $index['cod'] ?>" title="Excluir"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <?php
                            endforeach;
                            ?>  
                        </table>
                    </article>
                </section>
            </div>

            <?php
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
if (isset($usuarios) && is_array($usuarios)) :
    foreach ($usuarios as $indice):
        ?>        
        <!--MODAL - ESTRUTURA BÁSICA-->
        <section class="modal fade" id="modal_de_exclusao_<?php echo $indice['cod'] ?>" tabindex="-1" aria-labelledby="modal_de_exclusao_<?php echo $indice['cod'] ?>" aria-hidden="true">
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
                            <li><b>Nome: </b> <?php echo!empty($indice['nome']) ? $indice['nome'] : '' ?>;</li>
                            <li><b>Email: </b> <?php echo!empty($indice['email']) ? $indice['email'] : '0' ?>.</li>
                        </ul>
                        <p class="text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro e todos registos relacionados ao mesmo deixaram de existir no sistema.</p>
                    </article>
                    <footer class="modal-footer">
                        <a class="btn btn-danger pull-left" href="<?php echo BASE_URL . 'usuario/excluir/' . $indice['cod'] ?>"> <i class="fa fa-trash"></i> Excluir</a> 
                        <button class="btn btn-default" type="button" data-bs-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    </footer>
                </section>
            </article>
        </section>
        <?php
    endforeach;
endif;
?>