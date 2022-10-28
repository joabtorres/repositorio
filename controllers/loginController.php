<?php

class loginController extends controller {

    public function index() {
        $dados = array();
        if (isset($_POST['nEntrar'])) {
            $usuario = array();
            $usuario['email'] = $_POST['nEmail'];
            $usuario['senha'] = $_POST['nSenha'];

            $crudModel = new crud_db();
            $resultado = $crudModel->read_specific("SELECT * FROM usuario WHERE email=:email and senha = SHA1(md5(:senha))", $usuario);
            if (isset($resultado) && !empty($resultado)) {
                if ($resultado['status'] == 1) {
                    $_SESSION['usuario'] = $resultado;
                    $url = BASE_URL . 'home';
                    header('location: ' . $url);
                } else {
                    $dados['mensagem'] = 'USUÁRIO DESATIVADO NO SISTEMA';
                }
            } else {
                $dados['mensagem'] = 'O Campo E-mail e/ou Senha está incorreto!';
            }
        } else {
            unset($_SESSION['usuario']);
        }
        $this->loadView('login', $dados);
    }

}
