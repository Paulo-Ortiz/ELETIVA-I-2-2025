<?php include("cabecalho.php") ?>
<div class="container py-3">
    <h1>Exercício 4 - Funções</h1>
    <form method="post">
        <div class="mb-3">
            <label for="dia" class="form-label">Digite um dia:</label>
            <input type="text" id="dia" name="dia" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="mes" class="form-label">Digite um mês:</label>
            <input type="text" id="mes" name="mes" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="ano" class="form-label">Digite um ano:</label>
            <input type="text" id="ano" name="ano" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];

        function verificarData($mes, $dia, $ano)
        {
            return checkdate($mes, $dia, $ano);
        }
        echo "<p></p>";
        if (verificarData($mes, $dia, $ano)) {
            echo "A data informada é válida: " . $dia . "/" . $mes . "/" . $ano;
        } else {
            echo "A data informada não existe.";
        }
    }
    include("rodape.php")
    ?>