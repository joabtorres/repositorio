<?php

class usuarioController extends controller {

    public function index() {
        $this->cadastrar();
    }

    public function cadastrar() {
        if ($this->checkUser() >= 1) {
            $dados = array();
            $crudModel = new crud_db();
            if (isset($_POST['nSalvar'])) {
                $formCad = array(
                    'instituicao_cod' => $this->getCodInstituicao(),
                    'nome' => addslashes($_POST['nNome']),
                    'email' => addslashes($_POST['nEmail']),
                    'senha' => addslashes($_POST['nSenha']),
                    'nivel' => 1,
                    'status' => 1
                );
                $resultado = $crudModel->read_specific('SELECT * FROM usuario WHERE email=:email', array('email' => $formCad['email']));
                if (empty($resultado)) {
                    $resultado = $crudModel->create('INSERT INTO usuario (instituicao_cod, nome, email, senha, nivel, status) VALUES (:instituicao_cod, :nome, :email, SHA1(MD5(:senha)), :nivel, :status)', $formCad);
                    if ($resultado) {
                        $_SESSION['cad_acao'] = true;
                        $url = BASE_URL . 'usuario/cadastrar';
                        header("Location: " . $url);
                    }
                } else {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "<i class='fa fa-close' aria-hidden='true'></i> Usuário já cadastrado!");
                }
            } else if (isset($_SESSION['cad_acao']) && !empty($_SESSION['cad_acao'])) {
                $_SESSION['cad_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "<i class='fa fa-check-circle' aria-hidden='true'></i> Cadastro realizado com sucesso!");
            }
            $this->loadTemplate('usuario/cadastrar', $dados);
        } else {
            $url = BASE_URL . 'home';
            header("location: %url");
        }
    }

    public function editar($cod) {
        if ($this->checkUser() >= 1) {
            $dados = array();
            $crudModel = new crud_db();
            $usuario = $crudModel->read_specific('SELECT * FROM  usuario WHERE cod=:cod', array('cod' => $cod));
            if (isset($_POST['nSalvar'])) {
                $formCad = array(
                    'cod' => addslashes($_POST['nCod']),
                    'nome' => addslashes($_POST['nNome']),
                    'email' => addslashes($_POST['nEmail']),
                    'nivel' => 1,
                    'status' => 1
                );
                if (!empty($_POST['nSenha'])) {
                    $formCad['senha'] = addslashes($_POST['nSenha']);
                }
                $resultado = $crudModel->read_specific('SELECT * FROM usuario WHERE email=:email', array('email' => $formCad['email']));
                if (!empty($resultado) && $resultado['email'] != $usuario['email']) {
                    $dados['erro'] = array('class' => 'alert-danger', 'msg' => "<i class='fa fa-close' aria-hidden='true'></i> Usuário já cadastrado!");
                } else {
                    if (isset($formCad['senha'])) {
                        $resultado = $crudModel->create('UPDATE usuario SET nome=:nome, email=:email, senha=SHA1(MD5(:senha)), nivel=:nivel, status=:status WHERE cod=:cod', $formCad);
                    } else {
                        $resultado = $crudModel->create('UPDATE usuario SET nome=:nome, email=:email, nivel=:nivel, status=:status WHERE cod=:cod', $formCad);
                    }
                    if ($resultado) {
                        $_SESSION['cad_acao'] = true;
                        $url = BASE_URL . 'usuario/editar/' . $cod;
                        header("Location: " . $url);
                    }
                }
            } else if (isset($_SESSION['cad_acao']) && !empty($_SESSION['cad_acao'])) {
                $_SESSION['cad_acao'] = false;
                $dados['erro'] = array('class' => 'alert-success', 'msg' => "<i class='fa fa-check-circle' aria-hidden='true'></i> Alteração realizada com sucesso!");
            }
            $dados['cadForm'] = $usuario;
            $this->loadTemplate('usuario/editar', $dados);
        } else {
            $url = BASE_URL . 'home';
            header("location: %url");
        }
    }

    public function consultar($page = 1) {
        if ($this->checkUser()) {
            $crudModel = new crud_db();
            $dados = array();
            $sql = 'SELECT * FROM usuario WHERE cod>0 ';
            $arrayForm = array();
            if (isset($_GET['nBuscar'])) {
                switch ($_GET['nPor']) {
                    case 'Nome':
                        $sql = $sql . ' AND nome LIKE "%' . addslashes($_GET['nCampo']) . '%" ';
                        break;
                    default :
                        $sql = $sql . ' AND email LIKE "%' . addslashes($_GET['nCampo']) . '%" ';
                        break;
                }
            }
            $dados['usuarios'] = $crudModel->read($sql, $arrayForm);

            $this->loadTemplate('usuario/consultar', $dados);
        } else {
            $url = BASE_URL . 'home';
            header("location: $url");
        }
    }

    public function excluir($cod) {
        if ($this->checkUser()) {
            $crudModel = new crud_db();
            if ($crudModel->remove('DELETE FROM usuario WHERE cod=:cod', array('cod' => $cod))) {
                header("location: $url");
            }
        } else {
            $url = BASE_URL . 'home';
            header("location: $url");
        }
    }

}
