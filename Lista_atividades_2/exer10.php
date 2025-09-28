<?php include('cabecalho.php') ?>
<div class="container py-3 col-md-6">
    <h1>Exercicio 10</h1>
    <p>Tabuada</p>
    <form method="post">
        <div class="mb-3">
            <label for="numero" class="form-label">Numero</label>
            <input type="number" id="numero" name="numero" class="form-control" required="" placeholder="Insira um número e receba sua respectiva tabuada">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
</div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = $_POST['numero'];
        if($numero>=1){
            for($i=1;$i<=10;$i++){
                $multiplicacao = $numero * $i;
                echo "<p class='text-center'>".$numero." x ".$i." = ".$multiplicacao. "</p>";
            }}
        else{
            echo "<p class='text-center'>É necessário usar um valor acima de 0.</p>";
        }
        }
include('rodape.php') ?>