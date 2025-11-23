<?php
require("conexao.php");
session_start();

// ----------- CADASTRAR CURSO -----------
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $carga = $_POST['carga_horaria'];

    $stmt = $pdo->prepare("INSERT INTO cursos (nome, descricao, carga_horaria, data_criacao) VALUES (?, ?, ?, NOW())");

    if ($stmt->execute([$nome, $descricao, $carga])) {
        $msg = "<div class='alert alert-success text-center'>Curso cadastrado com sucesso!</div>";
    } else {
        $msg = "<div class='alert alert-danger text-center'>Erro ao cadastrar!</div>";
    }
}

// ----------- EXCLUIR CURSO -----------
if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];

    $stmt = $pdo->prepare("DELETE FROM cursos WHERE id = ?");
    if ($stmt->execute([$id])) {
        $msg = "<div class='alert alert-success text-center'>Curso excluído!</div>";
    } else {
        $msg = "<div class='alert alert-danger text-center'>Erro ao excluir!</div>";
    }
}

// ----------- BUSCAR DADOS PARA EDIÇÃO -----------
$editando = false;
if (isset($_GET['editar'])) {
    $editando = true;
    $id_edit = $_GET['editar'];

    $stmt = $pdo->prepare("SELECT * FROM cursos WHERE id = ?");
    $stmt->execute([$id_edit]);
    $curso_edit = $stmt->fetch(PDO::FETCH_ASSOC);
}

// ----------- SALVAR EDIÇÃO -----------
if (isset($_POST['salvar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $carga = $_POST['carga_horaria'];

    $stmt = $pdo->prepare("UPDATE cursos SET nome = ?, descricao = ?, carga_horaria = ? WHERE id = ?");
    
    if ($stmt->execute([$nome, $descricao, $carga, $id])) {
        $msg = "<div class='alert alert-success text-center'>Curso atualizado com sucesso!</div>";
    } else {
        $msg = "<div class='alert alert-danger text-center'>Erro ao atualizar!</div>";
    }

    $editando = false;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>CRUD - Cursos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<!-- NAVBAR -->
<?php include("navbar.php"); ?>

<div class="container mt-4">

    <h2 class="text-center mb-4">📘 Gerenciar Cursos</h2>

    <!-- MENSAGENS -->
    <?php if (isset($msg)) echo $msg; ?>

    <!-- FORMULÁRIO -->
    <div class="card p-4 mb-4">
        <h5><?php echo $editando ? "✏ Editar Curso" : "➕ Cadastrar Novo Curso"; ?></h5>

        <form method="POST">
            <?php if ($editando): ?>
                <input type="hidden" name="id" value="<?= $curso_edit['id'] ?>">
            <?php endif; ?>

            <div class="mb-3">
                <label class="form-label">Nome do Curso</label>
                <input type="text" name="nome" class="form-control" required
                       value="<?= $editando ? $curso_edit['nome'] : "" ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3"><?= $editando ? $curso_edit['descricao'] : "" ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Carga Horária (horas)</label>
                <input type="number" name="carga_horaria" class="form-control" required
                       value="<?= $editando ? $curso_edit['carga_horaria'] : "" ?>">
            </div>

            <?php if ($editando): ?>
                <button type="submit" name="salvar" class="btn btn-warning w-100">Salvar Alterações</button>
            <?php else: ?>
                <button type="submit" name="cadastrar" class="btn btn-primary w-100">Cadastrar Curso</button>
            <?php endif; ?>
        </form>
    </div>

    <!-- LISTAGEM -->
    <div class="card p-4">
        <h5 class="mb-3">📋 Lista de Cursos</h5>

        <table class="table table-striped table-bordered text-center">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Carga Horária</th>
                    <th>Data Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM cursos ORDER BY id DESC");
                foreach ($stmt as $row):
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td><?= $row['descricao'] ?></td>
                    <td><?= $row['carga_horaria'] ?>h</td>
                    <td><?= $row['data_criacao'] ?></td>
                    <td>
                        <a href="?editar=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="?excluir=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
