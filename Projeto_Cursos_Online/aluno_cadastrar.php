<?php
require "conexao.php"; //CRIAR (CREATE)
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $data_nascimento = $_POST["data_nascimento"];

    try {
        $sql = "INSERT INTO alunos (nome, email, telefone, data_nascimento) 
                VALUES (:nome, :email, :telefone, :data_nascimento)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ":nome" => $nome,
            ":email" => $email,
            ":telefone" => $telefone,
            ":data_nascimento" => $data_nascimento
        ]);

        header("Location: alunos.php?msg=cadastrado");
        exit;

    } catch (Exception $e) {
        die("Erro ao cadastrar aluno: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3>👨‍🎓 Cadastrar Novo Aluno</h3>
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
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control">
            </div>

            <button class="btn btn-success">Salvar</button>
            <a href="alunos.php" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</div>

</body>
</html>


