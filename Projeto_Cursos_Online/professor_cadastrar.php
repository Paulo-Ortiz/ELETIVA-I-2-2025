<?php
require "conexao.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $formacao = $_POST["formacao"];

    try {
        $sql = "INSERT INTO professores (nome, email, formacao, data_cadastro)
                VALUES (:nome, :email, :formacao, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":nome" => $nome,
            ":email" => $email,
            ":formacao" => $formacao
        ]);

        header("Location: professores.php?msg=cadastrado");
        exit;

    } catch (Exception $e) {
        die("Erro: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include "navbar.php"; ?>

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3>👨‍🏫 Cadastrar Novo Professor</h3>
        <hr>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Formação</label>
                <input type="text" name="formacao" class="form-control">
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="professores.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</div>

</body>
</html>
