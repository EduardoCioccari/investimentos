<div class="modal fade" id="modalCadastro" tabindex="-1" aria-labelledby="modalCadastroLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalCadastroLabel">Novo Ativo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" action="scripts/salvar_investimentos.php" id="formCadastro">

                    <div class="mb-3">
                        <label for="nomeAtivo" class="form-label">Nome / Ticker</label>
                        <input type="text" class="form-control" id="nomeAtivo" name="nomeAtivo" placeholder="Ex: PETR4" required>
                    </div>

                    <div class="mb-3">
                        <label for="classeAtivo" class="form-label">Classe</label>
                        <select class="form-select" id="classeAtivo" name="classeAtivo" required>
                            <option value="" selected disabled>Selecione a classe...</option>
                            <option value="tesouro">Tesouro Direto</option>
                            <option value="cdb">CDB</option>
                            <option value="acoes">Ações</option>
                            <option value="fiis">FIIs</option>
                            <option value="fundo">Fundos de Investimento</option>
                            <option value="bdr">BDRs</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dataCompra" class="form-label">Data da Compra</label>
                        <input type="date" class="form-control" id="dataCompra" name="dataCompra" required>
                    </div>

                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="0" step="any" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="valorPago" class="form-label">Valor Pago (R$)</label>
                        <input type="number" class="form-control" id="valorPago" name="valorPago" placeholder="0,00" step="0.01" min="0" required>
                    </div>

                    <div class="mb-3" id="divTaxaRentabilidade" style="display: none;">
                        <label for="taxaRentabilidade" class="form-label">Taxa de Rentabilidade (% a.a.)</label>
                        <input type="number" class="form-control" id="taxaRentabilidade" name="taxaRentabilidade" placeholder="Ex: 10,5" min="0">
                        <div class="form-text">Para ativos renda fixa (CDB, Tesouro).</div>
                    </div>

                    <div class="mb-3">
                        <label for="impostoRenda" class="form-label">% Imposto de Renda (se houver)</label>
                        <input type="number" class="form-control" id="impostoRenda" name="impostoRenda" placeholder="0" min="0">
                        <div class="form-text">Deixe em branco se for isento.</div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar cadastro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Se o ativo for tesouro ou cdb abre o input para preencher taxa de rentabilidade. -->
    <script>
        const selectClasse = document.getElementById('classeAtivo');
        const divTaxa = document.getElementById('divTaxaRentabilidade');

        selectClasse.addEventListener('change', function() {
            const valorSelecionado = this.value;

            // Verifica se é Tesouro ou CDB
            if (valorSelecionado === 'tesouro' || valorSelecionado === 'cdb') {
                divTaxa.style.display = 'block';
            } else {
                divTaxa.style.display = 'none';
                document.getElementById('taxaRentabilidade').value = '';
            }
        });
    </script>
</div>