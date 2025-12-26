<?php
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

            <div class="card">
                <div class="card-body">
                    <p class="text-muted text-center">Nenhum ativo cadastrado ainda.</p>
                </div>
            </div>
        </div>
    </header>

    <main>

    </main>

    <!-- JS Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>