<?php include("cabecalho.php"); ?>

<h1>Exercício 1</h1>

<form method="post">
    <div class="col-lg-8 col-md-10 col-sm-12">
        <div class="row">
            <div class="col">
                <div class="col-md-10">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <label for="nome[]" class="form-label">Informe o <?= $i ?>º nome:</label>
                        <input type="text" name="nome[]" class="form-control" id="nome<?= $i ?>" require="">
                    <?php endfor; ?>
                </div>
            </div>
            <div class="col">
                <div class="col-md-10">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <label for="telefone[]" class="form-label">Informe o <?= $i ?>º telefone:</label>
                        <input type="number" name="telefone[]" class="form-control" id="telefone<?= $i ?>" require="">
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
    <p></p>
    <button type="submit" class="btn btn-primary">Ordenar</button>
</form>
<p></p>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomes = $_POST['nome'];
    $telefones = $_POST['telefone'];
    $infos = [];

    for ($i = 0; $i < 5; $i++) {
        $nome = $nomes[$i];
        $telefone = $telefones[$i];

        if (isset($infos[$nome]) or in_array($telefone, $infos)) {
            echo "<p class='text-danger text-center'>Contato com dado duplicado (não adicionado) - Nome:{$nome} // Telefone {$telefone}</p>";
        } else {
            $infos[$nome] = $telefone;
        }
    }

    ksort($infos);
    echo "<p class='fw-bold'>Lista de contatos ordenados por nomes:</p>";
    foreach ($infos as $nome => $telefone) {
        echo "<p>{$nome} - {$telefone}<p>";
    }
}
include("rodape.php");
?>