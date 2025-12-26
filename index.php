<?php
include "scripts/consulta_investimentos.php";
include "view/modal_cadastro.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos</title>
    <!-- Style Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Minha Carteira</h2>

                <div>
                    <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="modal" data-bs-target="#modalFiltros">
                        <i class="bi bi-funnel"></i> Filtros
                    </button>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCadastro">
                        <i class="bi bi-plus-lg"></i> Novo Ativo
                    </button>
                </div>
            </div>

    </header>

    <main>
        <div class="container">

            <?php if (count($listaAtivos) > 0): ?>

                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Data</th>
                                    <th>Ativo</th>
                                    <th>Classe</th>
                                    <th class="text-end">Qtd</th>
                                    <th class="text-end">Preço Médio</th>
                                    <th class="text-end">Total Investido</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listaAtivos as $ativo): ?>
                                    <tr>
                                        <td>
                                            <?php echo date('d/m/Y', strtotime($ativo['data_compra'])); ?>
                                        </td>

                                        <td class="fw-bold">
                                            <?php echo ($ativo['nome_ativo']); ?>
                                        </td>

                                        <td>
                                            <span class="badge bg-secondary">
                                                <?php echo ucfirst($ativo['classe_ativo']); ?>
                                            </span>
                                        </td>

                                        <td class="text-end">
                                            <?php echo number_format($ativo['quantidade_comprada'], 2, ',', '.'); ?>
                                        </td>

                                        <td class="text-end">
                                            R$ <?php echo number_format($ativo['valor_pago'], 2, ',', '.'); ?>
                                        </td>

                                        <td class="text-end fw-bold text-success">
                                            <?php
                                            $total = $ativo['valor_pago'] * $ativo['quantidade_comprada'];
                                            echo "R$ " . number_format($total, 2, ',', '.');
                                            ?>
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group btn-group-sm">
                                                <button class="btn btn-outline-primary" title="Editar">
                                                    <i class="bi bi-pencil"></i> E
                                                </button>
                                                <button class="btn btn-outline-danger" title="Vender/Baixar">
                                                    <i class="bi bi-cash-coin"></i> V
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            <?php else: ?>
                <div class="alert alert-info text-center" role="alert">
                    <h4 class="alert-heading">Sua carteira está vazia.</h4>
                    <p>Clique no botão <strong>Novo Ativo</strong> acima para começar seus investimentos.</p>
                </div>
            <?php endif; ?>

        </div>
    </main>

    <!-- JS Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>