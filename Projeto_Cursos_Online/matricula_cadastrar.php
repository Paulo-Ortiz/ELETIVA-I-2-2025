<?php
require "conexao.php";
session_start();

// Buscar alunos
$alunos = $pdo->query("SELECT id, nome FROM alunos ORDER BY nome")->fetchAll();

// Buscar cursos
$cursos = $pdo->query("SELECT id, nome FROM cursos ORDER BY nome")->fetchAll();

// Buscar professores
$professores = $pdo->query("SELECT id, nome FROM professores ORDER BY nome")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $sql = "INSERT INTO matriculas 
            (aluno_id, curso_id, professor_id, data_matricula, status)
            VALUES (:aluno_id, :curso_id, :professor_id, NOW(), :status)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":aluno_id" => $_POST["aluno_id"],
        ":curso_id" => $_POST["curso_id"],
        ":professor_id" => $_POST["professor_id"],
        ":status" => $_POST["status"]
    ]);

    header("Location: matriculas.php?msg=ok");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Cadastrar Matrícula</title>
</head>

<body class="bg-light">

<?php include "navbar.php"; ?>

<div class="container mt-4">
<div class="card p-4 shadow">

<h3>📝 Registrar Matrícula</h3>
<hr>

<form method="POST">

    <label class="form-label">Aluno</label>
    <select name="aluno_id" class="form-select mb-3" required>
        <option value="">Selecione...</option>
        <?php foreach ($alunos as $a): ?>
            <option value="<?= $a['id'] ?>"><?= $a['nome'] ?></option>
        <?php endforeach; ?>
    </select>

    <label class="form-label">Curso</label>
    <select name="curso_id" class="form-select mb-3" required>
        <option value="">Selecione...</option>
        <?php foreach ($cursos as $c): ?>
            <option value="<?= $c['id'] ?>"><?= $c['nome'] ?></option>
        <?php endforeach; ?>
    </select>

    <label class="form-label">Professor</label>
    <select name="professor_id" class="form-select mb-3" required>
        <option value="">Selecione...</option>
        <?php foreach ($professores as $p): ?>
            <option value="<?= $p['id'] ?>"><?= $p['nome'] ?></option>
        <?php endforeach; ?>
    </select>

    <label class="form-label">Status</label>
    <select name="status" class="form-select mb-3">
        <option value="Ativa">Ativa</option>
        <option value="Concluída">Concluída</option>
        <option value="Cancelada">Cancelada</option>
    </select>

    <button class="btn btn-success">Salvar</button>
    <a href="matriculas.php" class="btn btn-secondary">Voltar</a>

</form>
</div>
</div>

</body>
</html>
