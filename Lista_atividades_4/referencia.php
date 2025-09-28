<?php include("cabecalho.php"); ?>

<div class="container py-3">
    <h1>Exercicio Exemplo - Vetores</h1>
    <form method="post">
        <div class="mb-3">
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <label for="valor[]" class="form-label">Informe o <?= $i ?>º valor</label>
                <input type="number" id="valor[]" name="valor[]" class="form-control">
            <?php endfor; ?>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $vetor = $_POST['valor'];
        sort($vetor);
        foreach ($vetor as $v) {
            echo "<p>$v</p>";
        }
    }
    include("rodape.php");
    ?>