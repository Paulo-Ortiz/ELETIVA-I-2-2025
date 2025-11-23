<?php
require "conexao.php"; //DELETAR (DELETE)
session_start();

if (!isset($_GET["id"])) {
    die("ID inválido.");
}

$id = $_GET["id"];

try {
    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = :id");
    $stmt->execute([":id" => $id]);

    header("Location: alunos.php?msg=excluido");
    exit;

} catch (Exception $e) {
    die("Erro ao excluir aluno: " . $e->getMessage());
}

