<?php

require_once "../config/db_conexao.php";

$nome_ativo = $_POST["nomeAtivo"];
$classe_ativo = $_POST["classeAtivo"];
$data_compra = $_POST["dataCompra"];
$quantidade_comprada = $_POST["quantidade"];
$valor_pago = str_replace(",", ".", $_POST["valorPago"]);
$taxa_rentabilidade = $_POST["taxaRentabilidade"];
$imposto = $_POST["impostoRenda"];

try {
    $sql = "INSERT INTO ativos (nome_ativo, classe_ativo, data_compra, quantidade_comprada, valor_pago, taxa_rentabilidade, imposto)
VALUES (:nome_ativo, :classe_ativo, :data_compra, :quantidade_comprada, :valor_pago, :taxa_rentabilidade, :imposto)";

    $stmt = $conexao->prepare($sql);

    $stmt->execute([
        ":nome_ativo" => $nome_ativo,
        ":classe_ativo" => $classe_ativo,
        ":data_compra" => $data_compra,
        ":quantidade_comprada" => $quantidade_comprada,
        ":valor_pago" => $valor_pago,
        ":taxa_rentabilidade" => $taxa_rentabilidade,
        ":imposto" => $imposto
    ]);

    if ($stmt->rowCount() > 0) {
        header("Location: ../index.php?status=sucesso");
        exit();
    };
} catch (PDOException $e) {
    echo "Erro ao tentar cadastrar: " . $e->getMessage();
}
