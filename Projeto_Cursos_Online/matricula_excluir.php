<?php
require "conexao.php";

$id = $_GET["id"];

$sql = "DELETE FROM matriculas WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([":id" => $id]);

header("Location: matriculas.php?msg=excluida");
exit;
