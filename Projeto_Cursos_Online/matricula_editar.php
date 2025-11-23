<?php
require "conexao.php";
session_start();

$id = $_GET["id"];

// Buscar matrícula atual
$sql = "SELECT * FROM matriculas WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([":id" => $id]);
$mat = $stmt->fetch();

// Buscar listas
$alunos = $pdo->query("SELECT * FROM alunos ORDER BY nome")->fetchAll();
$cursos = $pdo->query("SELECT * FROM cursos ORDER BY nome")->fetchAll();
$professores = $pdo->query("SELECT * FROM professores ORDER BY nome")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $sql = "UPDATE matriculas SET 
            aluno_id = :aluno_id,
            curso_id = :curso_id,
            professor_id = :professor_id,
            status = :status
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":aluno_id" => $_POST["aluno_id"],
        ":curso_id" => $_POST["curso_id"],
        ":professor_id" => $_POST["professor_id"],
        ":status" => $_POST["status"],
        ":id" => $id
    ]);

    header("Location: matriculas.php?msg=editado");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Editar Matrícula</title>
</head>

<body class="bg-light">

<?php include "navbar.php"; ?>

<div class="container mt-4">
<div class="card p-4 shadow">
<h3>✏ Editar Matrícula</h3>
<hr>

<form method="POST">

    <label>Aluno</label>
    <select name="aluno_id" class="form-select mb-3">
        <?php foreach ($alunos as $a): ?>
            <option value="<?= $a['id'] ?>" <?= $a['id'] == $mat['aluno_id'] ? "selected" : "" ?>>
                <?= $a['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Curso</label>
    <select name="curso_id" class="form-select mb-3">
        <?php foreach ($cursos as $c): ?>
            <option value="<?= $c['id'] ?>" <?= $c['id'] == $mat['curso_id'] ? "selected" : "" ?>>
                <?= $c['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Professor</label>
    <select name="professor_id" class="form-select mb-3">
        <?php foreach ($professores as $p): ?>
            <option value="<?= $p['id'] ?>" <?= $p['id'] == $mat['professor_id'] ? "selected" : "" ?>>
                <?= $p['nome'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Status</label>
    <select name="status" class="form-select mb-3">
        <option <?= $mat['status']=="Ativa"?"selected":"" ?>>Ativa</option>
        <option <?= $mat['status']=="Concluída"?"selected":"" ?>>Concluída</option>
        <option <?= $mat['status']=="Cancelada"?"selected":"" ?>>Cancelada</option>
    </select>

    <button class="btn btn-primary">Salvar</button>
    <a href="matriculas.php" class="btn btn-secondary">Voltar</a>

</form>
</div>
</div>

</body>
</html>
