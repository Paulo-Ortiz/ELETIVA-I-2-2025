<?php
require "conexao.php";

if (!isset($_GET["id"])) {
    header("Location: professores.php");
    exit;
}

$id = $_GET["id"];

$sql = "DELETE FROM professores WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: professores.php?msg=excluido");
exit;
