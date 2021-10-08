<?php
session_start();

//DEFINE A URL BASE DO SISTEMA
define("ROOT", "http://localhost/login");

define("APP_NAME", "LoginSys");
define("APP_VERSION", "0.0.1-beta");

//DEFINE A TIMEZONE PARA HORARIO DE SAO PAULO
date_default_timezone_set('America/Sao_Paulo');


//CONFIGS DO DATALAYER - BANCO DE DADOS
define("DATA_LAYER_CONFIG", [
    "driver"    => "mysql",
    "host"      => "localhost",
    "port"      => "3306",
    "dbname"    => "db_flogsys",
    "username"  => "root",
    "passwd"    => "*11*Web*",
    "options"   => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

//FUNCAO PARA CHAMAR URLS NO SISTEMAS
function url(string $uri = null): string
{
    if ($uri) {
        return ROOT . "/{$uri}";
    }
    return ROOT;
}

//FUNCAO PARA CHAMAR OS ASSETS DO SISTEMA
function asset($path): string
{
    return ROOT . "/public/assets{$path}";
}