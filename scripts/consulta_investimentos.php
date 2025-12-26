<?php

require_once "config/db_conexao.php";

try {
    $sql = "SELECT * FROM ativos ORDER BY data_compra DESC";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();

    $listaAtivos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar dados: " . $e->getMessage();
}
