<?php

class homeController extends controller {

    public function index($page = "page-1") {
        $dados = array();
        $crudModel = new crud_db();
        $dados['areas_de_conhecimento'] = $crudModel->read('SELECT * FROM areas_de_conhecimento WHERE instituicao_cod=:cod', array('cod' => $this->getCodInstituicao()));
        $dados['turmas'] = $crudModel->read('SELECT t.*, c.curso FROM turma AS t INNER JOIN curso AS c ON t.curso_cod=c.cod');
        $dados['cursos'] = $crudModel->read('SELECT * FROM curso WHERE instituicao_cod=:cod', array('cod' => $this->getCodInstituicao()));
        $sql = 'SELECT p.*, a.area FROM publicacao AS p  INNER JOIN areas_de_conhecimento as a INNER JOIN turma as t INNER JOIN curso as c WHERE p.cod>0 AND p.area_cod=a.cod AND t.curso_cod=c.cod AND t.cod=p.turma_cod ';
        $arrayForm = array();
        $parametros = '';
        if (isset($_GET['nBuscar'])) {
            $parametros = "?nAutor='" . $_GET['nAutor'] . "'&nTitulo='" . $_GET['nTitulo'] . "'&nPalavras='" . $_GET['nPalavras'] . "'&nAreas='" . $_GET['nAreas'] . "'&nModalidade='" . $_GET['nModalidade'] . "'&nCurso='" . $_GET['nCurso'] . "'&nTurma='" . $_GET['nTurma'] . "'&Buscar=Buscar";
            //nAutor
            if (!empty($_GET['nAutor'])) {
                $sql .= " AND p.autor LIKE '%" . addslashes($_GET['nAutor']) . "%' ";
            }
            //nAutor
            if (!empty($_GET['nTitulo'])) {
                $sql .= " AND p.titulo LIKE '%" . addslashes($_GET['nTitulo']) . "%' ";
            }
            //nPalavras
            if (!empty($_GET['nPalavras'])) {
                $sql .= " AND p.palavras_chave LIKE '%" . addslashes($_GET['nPalavras']) . "%' ";
            }
            //nAreas
            if (!empty($_GET['nAreas'])) {
                $sql .= " AND p.area_cod=:area_cod ";
                $arrayForm['area_cod'] = addslashes($_GET['nAreas']);
            }
            //nAreas
            if (!empty($_GET['nModalidade'])) {
                $sql .= " AND p.modalidade=:modalidade ";
                $arrayForm['modalidade'] = addslashes($_GET['nModalidade']);
            }
            //nCurso
            if (!empty($_GET['nCurso'])) {
                $sql .= " AND c.cod=:cod_curso ";
                $arrayForm['cod_curso'] = addslashes($_GET['nCurso']);
            }
            //nTurma
            if (!empty($_GET['nTurma'])) {
                $sql .= " AND p.turma_cod=:turma_cod ";
                $arrayForm['turma_cod'] = addslashes($_GET['nTurma']);
            }
        }
        //paginacao
        $limite = 10;
        $total_registro = $crudModel->read($sql, $arrayForm);
        $total_registro = empty($total_registro) ? array() : $total_registro;
        $paginas = count($total_registro) / $limite;
        $indice = 0;
        $page = (isset($page) && !empty($page)) ? explode("-", $page) : 1;
        $pagina_atual = $page[1];
        $indice = ($pagina_atual - 1) * $limite;
        $dados["paginas"] = $paginas;
        $dados["pagina_atual"] = $pagina_atual;
        $dados['metodo_buscar'] = $parametros;
        $sql .= "  ORDER BY p.cod ASC LIMIT $indice,$limite ";
        $dados['publicacoes'] = $crudModel->read($sql, $arrayForm);

        $dados['maisvisitados'] = $crudModel->read('SELECT cod, titulo FROM publicacao ORDER BY qtd DESC LIMIT 0,10');
        $this->loadTemplate('home', $dados);
    }

    //ultilizado no cadastro e edição
    public function get_tipo_turma() {
        header('Content-Type: text/html; charset=utf-8');
        if (isset($_POST) && is_array($_POST) && !empty($_POST)) {
            $crudModel = new crud_db();
            $cod = isset($_POST['cod']) ? $_POST['cod'] : null;
            if (!empty($cod)) {
                $resultado = $crudModel->read("SELECT * FROM turma WHERE curso_cod=:cod ORDER BY turma ASC", array('cod' => $cod));
            } else {
                $resultado = $crudModel->read("SELECT * FROM turma ORDER BY turma ASC");
            }
            echo '<option value ="">Todas</option>';
            foreach ($resultado as $indice) {
                echo '<option value = "' . $indice['cod'] . '">' . $indice['turma'] . '</option>';
            }
        }
    }

}

?>