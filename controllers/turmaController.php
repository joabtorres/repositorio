<?php

class turmaController extends controller {

    public function index() {
        $this->cadastrar();
    }

    public function cadastrar() {
        if ($this->checkUser() >= 1) {
            $dados = array();
            $crudModel = new crud_db();
            $dados['cursos'] = $crudModel->read("SELECT * FROM curso WHERE instituicao_cod=:cod", array('cod' => $this->getCodInstituicao()));
            if (isset($_POST['nSalvar'])) {
                $formCad = array(
                    'instituicao_cod' => $this->getCodInstituicao(),
                    'curso_cod' => addslashes($_POST['nCurso']),
                    'turma' => addslashes($_POST['nTurma']),
                    'ano' => addslashes($_POST['nAno'])
                );
                $resultado = $crudModel->create('INSERT INTO turma (instituicao_cod, curso_cod, turma, ano) VALUES (:instituicao_cod, :curso_cod, :turma, :ano)', $formCad);
                if ($resultado) {
                    $_SESSION['cad_acao'] = true;
                    $url = BASE_URL . 'turma/cadastrar';
                    header("Location: " . $url);
                }
            } else if (isset($_SESSION['cad_acao']) && !empty($_SESSION['cad_acao'])) {
                $_SESSION['cad_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "<i class='fa fa-check-circle' aria-hidden='true'></i> Cadastro realizado com sucesso!");
            }
            $this->loadTemplate('turma/cadastrar', $dados);
        } else {
            $url = BASE_URL . 'home';
            header("location: $url");
        }
    }

    public function editar($cod) {
        if ($this->checkUser() >= 1) {
            $dados = array();
            $crudModel = new crud_db();
            $dados['cursos'] = $crudModel->read("SELECT * FROM curso WHERE instituicao_cod=:cod", array('cod' => $this->getCodInstituicao()));
            $formCad = $crudModel->read_specific('SELECT * FROM turma WHERE cod=:cod', array('cod' => $cod));
            if (isset($_POST['nSalvar'])) {
                $formCad = array(
                    'cod' => addslashes($_POST['nCod']),
                    'curso_cod' => addslashes($_POST['nCurso']),
                    'turma' => addslashes($_POST['nTurma']),
                    'ano' => addslashes($_POST['nAno'])
                );
                $resultado = $crudModel->update('UPDATE turma SET curso_cod=:curso_cod, turma=:turma, ano=:ano WHERE cod=:cod', $formCad);
                if ($resultado) {
                    $dados['erro'] = array('class' => 'alert-success', 'msg' => "<i class='fa fa-check-circle' aria-hidden='true'></i> Alteração realizada com sucesso!");
                }
            }
            $dados['cadForm'] = $formCad;
            $this->loadTemplate('turma/editar', $dados);
        } else {
            $url = BASE_URL . 'home';
            header("location: $url");
        }
    }

    public function consultar($page = 1) {
        if ($this->checkUser()) {
            $crudModel = new crud_db();
            $dados = array();
            $dados['turmas'] = $crudModel->read('SELECT t.*, c.curso FROM turma AS t INNER JOIN curso AS c ON t.curso_cod=c.cod');
            $dados['cursoss'] = $crudModel->read('SELECT * FROM curso WHERE instituicao_cod=:cod', array('cod' => $this->getCodInstituicao()));
            $sql = 'SELECT DISTINCT(c.curso), c.cod FROM curso as c INNER JOIN turma as t ON t.curso_cod=c.cod WHERE c.cod>0 ';
            $sql_cursos = 'SELECT t.turma, t.cod, COUNT(p.cod) as data FROM turma as t LEFT JOIN publicacao AS p ON t.cod=p.turma_cod WHERE t.cod>0 ';
            $arrayForm2 = array();
            $arrayForm = array();
            $parametros = '';
            if (isset($_GET['nBuscar'])) {
                $parametros = "&nCurso='" . $_GET['nCurso'] . "'&nTurma='" . $_GET['nTurma'] . "'&Buscar=Buscar";
                //nCurso
                if (!empty($_GET['nCurso'])) {
                    $sql .= " AND c.cod=:cod_curso ";
                    $arrayForm['cod_curso'] = addslashes($_GET['nCurso']);
                }
                //nTurma
                if (!empty($_GET['nTurma'])) {
                    $sql .= " AND t.cod=:turma_cod ";
                    $sql_cursos .= " AND t.cod=:turma_cod ";
                    $arrayForm2['turma_cod'] = addslashes($_GET['nTurma']);
                    $arrayForm['turma_cod'] = addslashes($_GET['nTurma']);
                }
            }
            $sql .= " GROUP BY c.cod ";
            $dados['cursos'] = $crudModel->read($sql, $arrayForm);
            if (!empty($dados['cursos'])) {
                $sql_cursos .= 'AND t.curso_cod=:cod GROUP BY t.turma';
                foreach ($dados['cursos'] as $index => $key) {
                    $arrayForm2['cod'] = $key['cod'];
                    $dados['cursos'][$index]['turmas'] = $crudModel->read($sql_cursos, $arrayForm2);
                }
            }

            $this->loadTemplate('turma/consultar', $dados);
        } else {
            $url = BASE_URL . 'home';
            header("location: $url");
        }
    }

    public function excluir($cod) {
        if ($this->checkUser()) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read('SELECT * FROM publicacao WHERE turma_cod=:cod', array('cod' => $cod));
            if (!empty($resultado)) {
                foreach ($resultado as $index) {
                    unlink($index['arquivo']);
                }
                $crudModel->remove('DELETE FROM publicacao WHERE turma_cod=:cod', array('cod' => $cod));
            }
            if ($crudModel->remove("DELETE FROM turma WHERE cod=:cod", array('cod' => $cod))) {
                $url = BASE_URL . 'turma/consultar';
                header("location: $url");
            }
        } else {
            $url = BASE_URL . 'home';
            header("location: $url");
        }
    }

}
