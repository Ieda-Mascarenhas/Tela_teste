<?php

$usuario = 'root';
$senha = '';
$host = 'localhost';
$database = 'teste';

$mysqli = new mysqli($host, $usuario, $senha, $database);


if($mysqli->error) {
    die('Erro na conexão com o banco de dados: ' . $mysqli->error);
}


