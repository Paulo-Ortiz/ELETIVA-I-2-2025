<?php include("cabecalho.php"); ?>

<div class="col-lg-10 col-md-10 col-sm-12">
    <h1>Exercicio 4</h1>
    <form method="post">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <p class="fw-bold">Item <?= $i ?></p>
            <div class="row inline-row mb-3">
                <div class="col-md-8">
                    <label for="nome<?= $i ?>" class="form-label">Nome</label>
                    <input type="text" id="nome<?= $i ?>" name="nomes[]" class="form-control" required="" placeholder="Insira aqui o nome do item">
                </div>
                <div class="col-md-4">
                    <label for="preco<?= $i ?>" class="form-label">Preço</label>
                    <input type="number" id="preco<?= $i ?>" name="precos[]" class="form-control" required="" placeholder="Insira aqui o preço" step="any">
                </div>
            </div>
        <?php endfor; ?>
        <div>
            <button type="submit" class="btn btn-success">Exibir Lista</button>
        </div>
</div>
<p></p>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomes = $_POST['nomes'];
    $precos = $_POST['precos'];
    $itens = [];
    for ($i = 0; $i < 5; $i++) {
        $nome = $nomes[$i];
        $preco = $precos[$i] + ($precos[$i] * 0.15);
        $itens[$nome] = $preco;
    }

    asort($itens);
    echo "<p class='fw-bold'>Lista de itens após 15% de imposto:</p>";
    foreach ($itens as $nome => $preco) {
        echo "<p>".$nome. " - R$".number_format($preco, 2, ',', '.')."<p>";
    }
}
include("rodape.php");
?>