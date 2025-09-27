<?php include("cabecalho.php") ?>
<div class="container py-3">
    <h1>Exercício 3 - Funções</h1>
    <form method="post">
        <div class="mb-3">
            <label for="palavra1" class="form-label">Digite a primeira palavra:</label>
            <input type="text" id="palavra1" name="palavra1" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="palavra2" class="form-label">Digite a segunda palavra:</label>
            <input type="text" id="palavra2" name="palavra2" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $palavra1 = $_POST['palavra1'];
        $palavra2 = $_POST['palavra2'];

        function palavraContida($palavra1, $palavra2)
        {
            return str_contains($palavra1, $palavra2);
        }
        echo "<p></p>";
        if (palavraContida($palavra1, $palavra2)) {
            echo "A palavra '$palavra2' está contida dentro de '$palavra1'.";
        } else {
            echo "A segunda palavra não está contida dentro da primeira palavra.";
        }
    }
    include("rodape.php")
    ?>