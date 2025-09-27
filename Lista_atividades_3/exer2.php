<?php include("cabecalho.php") ?>
<div class="container py-3">
    <h1>Exercício 2 - Funções</h1>
    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Digite o seu nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];

        function exibirNomeMaiusculo($nome)
        {
            echo "<p>O nome $nome em maiúsculo é: " . strtoupper($nome) . "</p>";
        }

        function exibirNomeMinusculo($nome)
        {
            echo "<p>O nome $nome em minúsculo é: " . strtolower($nome) . "</p>";
        }

        echo "<p> </p>";
        exibirNomeMaiusculo($nome);
        echo "<p> </p>";
        exibirNomeMinusculo($nome);
    }
    include("rodape.php")
    ?>