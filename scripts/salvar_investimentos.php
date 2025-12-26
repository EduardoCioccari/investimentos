<?php

require_once "../config/db_conexao.php";

$nome_ativo = strtoupper($_POST["nomeAtivo"]);
$classe_ativo = $_POST["classeAtivo"];
$data_compra = $_POST["dataCompra"];
$quantidade_comprada = $_POST["quantidade"];
$valor_pago = str_replace(",", ".", $_POST["valorPago"]);
$taxa_rentabilidade = $_POST["taxaRentabilidade"];
$imposto = $_POST["impostoRenda"];

try {
    // Verificando se o ativo já existe no banco.
    $sql_consultado = "SELECT id_ativo FROM ativos WHERE nome_ativo = :nome_ativo";
    $stmt = $conexao->prepare($sql_consultado);
    $stmt->execute([
        ":nome_ativo" => $nome_ativo,
    ]);

    $ativo_consultado = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se o ativo existe é feito o update.
    if ($ativo_consultado) {

        $id_ativo = $ativo_consultado["id_ativo"];
        $sql_update = "UPDATE ativos SET quantidade_comprada = quantidade_comprada + :quantidade_comprada WHERE id_ativo = :id_ativo";

        $stmt = $conexao->prepare($sql_update);

        $stmt->execute([
            ":quantidade_comprada" => $quantidade_comprada,
            ":id_ativo" => $id_ativo
        ]);
    } else {

        // Se o ativo é novo, é feito o cadastro normalmente.
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
    }

    if ($stmt->rowCount() > 0) {
        header("Location: ../index.php?status=sucesso");
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao tentar cadastrar: " . $e->getMessage();
}
