<?php
require "conexao.php"; //ATUALIZAR (UPDATE)
session_start();

if (!isset($_GET["id"])) {
    die("ID inválido.");
}

$id = $_GET["id"];

$stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = :id");
$stmt->execute([":id" => $id]);
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$aluno) {
    die("Aluno não encontrado!");
}

// Atualizar
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $data_nascimento = $_POST["data_nascimento"];

    try {
        $sql = "UPDATE alunos 
                SET nome = :nome, email = :email, telefone = :telefone, data_nascimento = :data_nascimento 
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":nome" => $nome,
            ":email" => $email,
            ":telefone" => $telefone,
            ":data_nascimento" => $data_nascimento,
            ":id" => $id
        ]);

        header("Location: alunos.php?msg=editado");
        exit;

    } catch (Exception $e) {
        die("Erro ao editar aluno: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- NAVBAR -->
<?php include("navbar.php"); ?>

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3>✏️ Editar Aluno</h3>
        <hr>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="<?= $aluno['nome'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" value="<?= $aluno['email'] ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" value="<?= $aluno['telefone'] ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" value="<?= $aluno['data_nascimento'] ?>">
            </div>

            <button class="btn btn-primary">Salvar Alterações</button>
            <a href="alunos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

</body>
</html>

