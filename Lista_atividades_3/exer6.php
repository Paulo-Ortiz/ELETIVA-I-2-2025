<?php include("cabecalho.php") ?>
<div class="container py-3">
    <h1>Exercício 6 - Funções</h1>
    <form method="post">
        <div class="mb-3">
            <label for="valor" class="form-label">Digite um valor:</label>
            <input type="text" id="valor" name="valor" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $valor = $_POST['valor'];


        function valorArredondado($valor)
        {
            echo "<p>O valor arredondado de $valor é " . round($valor) . "</p>";
        }

        echo "<p> </p>";
        valorArredondado($valor);
    }
    include("rodape.php")
    ?>