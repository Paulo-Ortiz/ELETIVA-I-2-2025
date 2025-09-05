<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercício 4 - Funções</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
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
    }

        function verificarData($mes, $dia, $ano){
        return checkdate($mes, $dia, $ano);
        
    }
    echo "<p></p>";
    if (verificarData($mes, $dia, $ano)) {
        echo "A data informada é válida: " . $dia . "/" . $mes . "/" . $ano;
    } else {
        echo "A data informada não existe.";
    }
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>