<?php

$dsn = "mysql:host=localhost;dbname=investimentos";
$usuario = "root";
$senha = "";

try {
    $conexao = new PDO($dsn, $usuario, $senha);

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    echo "Erro de conexão no banco de dados: " . $e->getMessage();
}
