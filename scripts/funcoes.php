<?php

function calcularPrecoMedio($qtdAtual, $precoMedioAtual, $qtdNova, $precoNovo)
{

    $qtdTotal = $qtdAtual + $qtdNova;
    $valorAtual = $qtdAtual * $precoMedioAtual;
    $valorNovo = $qtdNova * $precoNovo;

    return ($valorAtual + $valorNovo) / $qtdTotal;
}
