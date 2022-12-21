<?php

class publicacaoController extends controller {

    public function index() {
        $this->cadastrar();
    }

    public function cadastrar() {
        if ($this->checkUser() >= 1) {
            $dados = array();
            $crudModel = new crud_db();
            $dados['areas_de_conhecimento'] = $crudModel->read('SELECT * FROM areas_de_conhecimento WHERE instituicao_cod=:cod', array('cod' => $this->getCodInstituicao()));
            $dados['turmas'] = $crudModel->read('SELECT t.*, c.curso FROM turma AS t INNER JOIN curso AS c ON t.curso_cod=c.cod');
            if (isset($_POST['nSalvar'])) {
                $formCad = array(
                    'instituicao_cod' => $this->getCodInstituicao(),
                    'area_cod' => addslashes($_POST['nArea']),
                    'turma_cod' => addslashes($_POST['nTurma']),
                    'modalidade' => addslashes($_POST['nModalidade']),
                    'titulo' => addslashes($_POST['nTitulo']),
                    'data' => addslashes($_POST['nData']),
                    'autor' => addslashes($_POST['nAutor']),
                    'orientador' => addslashes($_POST['nOrientador']),
                    'coorientador' => addslashes($_POST['nCoorientador']),
                    'membro_1' => addslashes($_POST['nMembro_1']),
                    'membro_2' => addslashes($_POST['nMembro_2']),
                    'referencia' => addslashes($_POST['nReferencia']),
                    'resumo' => addslashes($_POST['nResumo']),
                    'palavras_chave' => addslashes($_POST['nPalavras']),
                    'abstract' => $_POST['nAbstract'],
                    'keywords' => $_POST['nKeywords']
                );
                if (isset($_FILES['nFile']) && $_FILES['nFile']['error'] == 0) {
                    $formCad['arquivo'] = $this->upload_file($_FILES['nFile']);
                    if (!empty($_POST['nFileEnviado'])) {
                        $crudModel->delete_file($_POST['nFileEnviado']);
                    }
                } else {
                    $formCad['arquivo'] = addslashes($_POST['nFileEnviado']);
                }
                $resultado = $crudModel->create('INSERT INTO publicacao (instituicao_cod, area_cod, turma_cod, modalidade, titulo, data, autor, orientador, coorientador, membro_1, membro_2, referencia, resumo, palavras_chave, abstract, keywords, arquivo) VALUES (:instituicao_cod, :area_cod, :turma_cod, :modalidade, :titulo, :data, :autor, :orientador, :coorientador, :membro_1, :membro_2, :referencia, :resumo, :palavras_chave, :abstract, :keywords, :arquivo)', $formCad);
                if ($resultado) {
                    $_SESSION['cad_acao'] = true;
                    $url = BASE_URL . 'publicacao/cadastrar';
                    header("Location: " . $url);
                }
            } else if (isset($_SESSION['cad_acao']) && !empty($_SESSION['cad_acao'])) {
                $_SESSION['cad_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "<i class='fa fa-check-circle' aria-hidden='true'></i> Cadastro realizado com sucesso!");
            }
            $this->loadTemplate('publicacao/cadastrar', $dados);
        } else {
            $url = BASE_URL . 'home';
            header("location: %url");
        }
    }

    public function editar($cod) {
        if ($this->checkUser() >= 1) {
            $dados = array();
            $crudModel = new crud_db();
            $dados['areas_de_conhecimento'] = $crudModel->read('SELECT * FROM areas_de_conhecimento WHERE instituicao_cod=:cod', array('cod' => $this->getCodInstituicao()));
            $dados['turmas'] = $crudModel->read('SELECT t.*, c.curso FROM turma AS t INNER JOIN curso AS c ON t.curso_cod=c.cod');
            $formCad = $crudModel->read_specific('SELECT * FROM publicacao WHERE cod = :cod', array('cod' => $cod));
            if (isset($_POST['nSalvar'])) {
                $formCad = array(
                    'cod' => $_POST['nCod'],
                    'instituicao_cod' => $this->getCodInstituicao(),
                    'area_cod' => addslashes($_POST['nArea']),
                    'turma_cod' => addslashes($_POST['nTurma']),
                    'modalidade' => addslashes($_POST['nModalidade']),
                    'titulo' => addslashes($_POST['nTitulo']),
                    'data' => addslashes($_POST['nData']),
                    'autor' => addslashes($_POST['nAutor']),
                    'orientador' => addslashes($_POST['nOrientador']),
                    'coorientador' => addslashes($_POST['nCoorientador']),
                    'membro_1' => addslashes($_POST['nMembro_1']),
                    'membro_2' => addslashes($_POST['nMembro_2']),
                    'referencia' => addslashes($_POST['nReferencia']),
                    'resumo' => addslashes($_POST['nResumo']),
                    'palavras_chave' => addslashes($_POST['nPalavras']),
                    'abstract' => $_POST['nAbstract'],
                    'keywords' => $_POST['nKeywords']
                );
                if (isset($_FILES['nFile']) && $_FILES['nFile']['error'] == 0) {
                    $formCad['arquivo'] = $this->upload_file($_FILES['nFile']);
                    if (!empty($_POST['nFileEnviado'])) {
                        $crudModel->delete_file($_POST['nFileEnviado']);
                    }
                } else {
                    $formCad['arquivo'] = addslashes($_POST['nFileEnviado']);
                }
                $resultado = $crudModel->create('UPDATE publicacao SET instituicao_cod=:instituicao_cod, area_cod=:area_cod, turma_cod=:turma_cod, modalidade=:modalidade, titulo=:titulo, data=:data, autor=:autor, orientador=:orientador, coorientador=:coorientador, membro_1=:membro_1, membro_2=:membro_2, referencia=:referencia, resumo=:resumo, palavras_chave=:palavras_chave, abstract=:abstract, keywords=:keywords, arquivo=:arquivo WHERE cod=:cod', $formCad);
                if ($resultado) {
                    $_SESSION['cad_acao'] = true;
                    $url = BASE_URL . 'publicacao/editar/' . $cod;
                    header("Location: " . $url);
                }
            } else if (isset($_SESSION['cad_acao']) && !empty($_SESSION['cad_acao'])) {
                $_SESSION['cad_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "<i class='fa fa-check-circle' aria-hidden='true'></i> Alteração realizada com sucesso!");
            }
            $dados['cadForm'] = $formCad;
            $this->loadTemplate('publicacao/editar', $dados);
        } else {
            $url = BASE_URL . 'home';
            header("location: %url");
        }
    }

    private function upload_file($file) {
        $arquivo = array();
        $arquivo['temp'] = $file['tmp_name'];
        $arquivo['extensao'] = explode(".", $file['name']);
        $arquivo['extensao'] = strtolower(end($arquivo['extensao']));
        $arquivo['name'] = 'publicacao_' . date('d-m-Y') . "_" . md5(md5(rand(1000, 900000) . time())) . '.' . $arquivo['extensao'];
        $arquivo['diretorio'] = 'uploads/publicacao';
        $arquivo['arquivo'] = $arquivo['diretorio'] . "/" . $arquivo['name'];
        if (move_uploaded_file($arquivo['temp'], $arquivo['arquivo'])) {
            return $arquivo['arquivo'];
        } else {
            return null;
        }
    }

    public function publicacao($cod) {
        $crudModel = new crud_db();
        $resultado = $crudModel->read_specific("SELECT p.*, a.area, t.turma, c.curso FROM publicacao AS p  INNER JOIN areas_de_conhecimento as a INNER JOIN turma as t INNER JOIN curso as c WHERE p.cod>0 AND p.area_cod=a.cod AND t.curso_cod=c.cod AND t.cod=p.turma_cod AND p.cod=:cod", array('cod' => $cod));
        if ($resultado) {
            $qtd = intval($resultado['qtd']);
            $qtd++;
            $crudModel->create('UPDATE publicacao SET qtd=:qtd WHERE cod=:cod', array('qtd' => $qtd, 'cod' => $cod));
            $dados['publicacao'] = $resultado;
            $this->loadTemplate('publicacao/publicacao', $dados);
        } else {
            $url = BASE_URL . 'home';
            header("location: %url");
        }
    }

    public function excluir($cod) {
        if ($this->checkUser()) {
            $crudModel = new crud_db();
            $resultado = $crudModel->read('SELECT * FROM publicacao WHERE cod=:cod', array('cod' => $cod));
            if (!empty($resultado)) {
                foreach ($resultado as $index) {
                    unlink($index['arquivo']);
                }
                if ($crudModel->remove('DELETE FROM publicacao WHERE cod=:cod', array('cod' => $cod))) {
                    $url = BASE_URL . 'home/index';
                    header("location: $url");
                }
            }
        } else {
            $url = BASE_URL . 'home';
            header("location: $url");
        }
    }

}
