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
                    'senha' => addslashes($_POST['nSenha'])
                );
                $resultado = $crudModel->read_specific('SELECT * FROM usuario WHERE email=:email', array('email' => $formCad['email']));
                if (empty($resultado)) {
                    $resultado = $crudModel->create('INSERT INTO usuario (instituicao_cod, nome, email, senha) VALUES (:instituicao_cod, :nome, :email, SHA1(MD5(:senha)))', $formCad);
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

}
