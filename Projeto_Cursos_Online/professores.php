<?php
require "conexao.php";
session_start();

// Buscar professores
$sql = "SELECT * FROM professores ORDER BY id DESC";
$stmt = $pdo->query($sql);
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Professores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include "navbar.php"; ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>👨‍🏫 Professores</h2>
        <a href="professor_cadastrar.php" class="btn btn-primary">+ Novo Professor</a>
    </div>

    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'cadastrado'): ?>
        <div class="alert alert-success">Professor cadastrado com sucesso!</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'editado'): ?>
        <div class="alert alert-warning">Professor atualizado com sucesso!</div>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'excluido'): ?>
        <div class="alert alert-danger">Professor excluído!</div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover text-center">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Formação</th>
                        <th>Cadastrado em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($professores as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= $p['nome'] ?></td>
                        <td><?= $p['email'] ?></td>
                        <td><?= $p['formacao'] ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($p['data_cadastro'])) ?></td>
                        <td>
                            <a href="professor_editar.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="professor_excluir.php?id=<?= $p['id'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Deseja realmente excluir?');">
                               Excluir
                           </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
