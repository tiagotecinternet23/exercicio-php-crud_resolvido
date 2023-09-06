<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$db = "crud_escola";

try {
    $conexao = new PDO("mysql:host=$servidor; dbname=$db; charset=utf8", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die( "Erro: ".$e->getMessage() );
}

// var_dump($conexao);