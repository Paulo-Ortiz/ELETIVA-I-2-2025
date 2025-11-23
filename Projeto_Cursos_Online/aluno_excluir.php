<?php require("conexao.php"); ?> 

<?php
    if(!isset($_GET['id'])){
        die("ID não informado!");
    }

    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: alunos.php");
    exit;
?>
