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
                print_r($_POST);
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
            header("location: %url");
        }
    }

}
