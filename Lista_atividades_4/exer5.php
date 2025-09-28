<?php include("cabecalho.php"); ?>

<div class="col-lg-10 col-md-10 col-sm-12">
    <h1>Exercicio 5</h1>
    <form method="post">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <p class="fw-bold">Livro <?= $i ?></p>
            <div class="row inline-row mb-3">
                <div class="col-md-8">
                    <label for="nome<?= $i ?>" class="form-label">Nome do livro</label>
                    <input type="text" id="nome<?= $i ?>" name="nomes[]" class="form-control" required="" placeholder="Insira aqui o nome do livro">
                </div>
                <div class="col-md-4">
                    <label for="estoque<?= $i ?>" class="form-label">Quantidade em estoque</label>
                    <input type="number" id="estoque<?= $i ?>" name="estoques[]" class="form-control" required="" placeholder="Insira aqui o estoque">
                </div>
            </div>
        <?php endfor; ?>
        <div>
            <button type="submit" class="btn btn-success">Verificar estoque</button>
        </div>
        <p></p>
</div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomes = $_POST['nomes'];
    $estoques = $_POST['estoques'];
    $listaestoque = [];
    for ($i = 0; $i < 5; $i++) {
        $nome = $nomes[$i];
        $estoque = $estoques[$i];
        $listaestoque[$nome] = $estoque;
        if($estoque<5){
            echo "<p class='text-danger'>O livro {$nome} está com o estoque baixo {$estoque} unidade(s).</p>";
        }
    }

    ksort($listaestoque);
    echo "<p class='fw-bold'>Estoque de livros</p>";
    foreach ($listaestoque as $nome => $estoque) {
        echo "<p>Livro: {$nome} - Quantidade: {$estoque}<p>";
    }
}
include("rodape.php");
?>