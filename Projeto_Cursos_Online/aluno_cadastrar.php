<?php include("navbar.php"); ?> 
<?php require("conexao.php"); ?>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data_nascimento = $_POST['data_nascimento'];
        $data_cadastro = date("Y-m-d"); // automático

        $stmt = $pdo->prepare("INSERT INTO alunos (nome, email, telefone, data_nascimento, data_cadastro) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $email, $telefone, $data_nascimento, $data_cadastro]);

        header("Location: alunos.php");
        exit;
    }
?>

<div class="container mt-4">
    <h2>Cadastrar Aluno</h2>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">E-mail:</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone:</label>
            <input type="text" name="telefone" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="alunos.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

