<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 2 - Funções</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
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
    }

        function exibirNomeMaiusculo($nome){
        echo "<p>O nome $nome em maiúsculo é: " .strtoupper($nome). "</p>";
        
    }

       function exibirNomeMinusculo($nome){
        echo "<p>O nome $nome em minúsculo é: " .strtolower($nome). "</p>";
        
    }

    echo "<p> </p>";
    exibirNomeMaiusculo($nome);
    echo "<p> </p>";
    exibirNomeMinusculo($nome);
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>