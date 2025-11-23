<?php 
require "conexao.php";
session_start();

// Buscar matrículas + joins
$sql = "SELECT m.id, 
               a.nome AS aluno, 
               c.nome AS curso,
               p.nome AS professor,
               m.data_matricula,
               m.status
        FROM matriculas m
        LEFT JOIN alunos a ON a.id = m.aluno_id
        LEFT JOIN cursos c ON c.id = m.curso_id
        LEFT JOIN professores p ON p.id = m.professor_id
        ORDER BY m.id DESC";
$stmt = $pdo->query($sql);
$matriculas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Matrículas</title>
</head>

<body class="bg-light">

<?php include "navbar.php"; ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>📝 Matrículas</h3>
        <a href="matricula_cadastrar.php" class="btn btn-primary">Nova Matrícula</a>
    </div> 

    <table class="table table-bordered table-hover bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Aluno</th>
                <th>Curso</th>
                <th>Professor</th>
                <th>Data</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($matriculas as $m): ?>
            <tr>
                <td><?= $m['id'] ?></td>
                <td><?= $m['aluno'] ?></td>
                <td><?= $m['curso'] ?></td>
                <td><?= $m['professor'] ?></td>
                <td><?= date("d/m/Y H:i", strtotime($m['data_matricula'])) ?></td>
                <td><?= $m['status'] ?></td>

                <td>
                    <a href="matricula_editar.php?id=<?= $m['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="matricula_excluir.php?id=<?= $m['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Excluir matrícula?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

</body>
</html>
