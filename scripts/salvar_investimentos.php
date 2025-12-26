<?php

require_once "../config/db_conexao.php";

$nome_ativo = $_POST['nomeAtivo'];
$classe_ativo = $_POST['classeAtivo'];
$data_compra = $_POST['dataCompra'];
$quantidade_comprada = $_POST['quantidade'];
$valor_pago = $_POST['valorPago'];
$taxa_rentabilidade = $_POST['taxaRentabilidade'];
$imposto = $_POST['impostoRenda'];
