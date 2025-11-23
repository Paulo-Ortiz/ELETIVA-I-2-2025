<?php
require "conexao.php";
session_start();

if (!isset($_GET["id"])) {
    header("Location: professores.php");
    exit;
}

$id = $_GET["id"];

// Buscar professor
$sql = "SELECT * FROM professores WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$professor = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$professor) {
    die("Professor não encontrado!");
}

// Salvar edição
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $formacao = $_POST["formacao"];

    $sql = "UPDATE professores SET nome = ?, email = ?, formacao = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $formacao, $id]);

    header("Location: professores.php?msg=editado");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include "navbar.php"; ?>

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3>✏️ Editar Professor</h3>
        <hr>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" value="<?= $professor['nome'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" value="<?= $professor['email'] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Formação</label>
                <input type="text" name="formacao" value="<?= $professor['formacao'] ?>" class="form-control">
            </div>

            <button class="btn btn-warning">Salvar Alterações</button>
            <a href="professores.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

</body>
</html>
