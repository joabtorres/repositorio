<?php

require 'environment.php';

define("BASE_URL", 'http://localhost/repositorio/');
define("NAME_PROJECT", 'Repositório Institucional de Trabalho de Conclusão de Curso ');

global $config;
$config = array();
if (ENVIRONMENT == "development") {
    $config['dbname'] = 'repositorio';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    $config['dbname'] = 'ALTERAR ISSO ALTERAR ISSO ALTERAR ISSO ALTERAR ISSO';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}