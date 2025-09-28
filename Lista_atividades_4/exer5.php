<?php include("cabecalho.php"); ?>
<div class="col-lg-10 col-md-10 col-sm-12">

    <h1>Exercicio 5</h1>
    <p></p>
    <form method="post">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <p class="text-start">LIVRO <?= $i ?></p>
            <div class="row inline-row mb-3">
                <div class="col-md-8">
                    <label for="nomes<?= $i ?>" class="form-label">Título</label>
                    <input type="text" id="nomes<?= $i ?>" name="nomes[]" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="qtde<?= $i ?>" class="form-label">Qtde. em Estoque</label>
                    <input type="number" id="qtde<?= $i ?>" name="qtde[]" class="form-control">
                </div>
                <p></p>
            </div>
        <?php endfor; ?>
        <div>
            <button type="submit" class="btn btn-success">Organizar</button>
        </div>
</div>
<p></p>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomes = $_POST['nomes'];
    $quantidade = $_POST['qtde'];
    $produtos = [];

    for ($i = 0; $i < 5; $i++) {
        $nome = $nomes[$i];
        $qtd = $quantidade[$i];
            if ($quantidade < 5) {
                echo "O livro '{$nome}' está em baixa quantidade: {$qtd} unidades.<br>";
            } else {
                echo "Não existem produtos com nível de estoque baixo.";
            }
        }
    }

    uasort($produtos, function ($a, $b) {
        return strcmp($a['nome'], $b['nome']);
    });

    echo "<p class='fw-bold'>Lista de produtos</p>";
    foreach ($produtos as $codigo => $atributos) {
        echo "<p>Código: $codigo | Nome: {$atributos['nome']} | Qtde: {$atributos['qtd']}</p>";

    }
include("rodape.php");
?>