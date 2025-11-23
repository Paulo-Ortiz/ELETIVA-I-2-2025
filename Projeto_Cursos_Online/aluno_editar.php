<?php include("navbar.php"); ?> 
<?php require("conexao.php"); ?>

<?php
    if(!isset($_GET['id'])){
        die("ID não informado!");
    }

    $id = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = ?");
    $stmt->execute([$id]);
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!$aluno){
        die("Aluno não encontrado!");
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data_nascimento = $_POST['data_nascimento'];

        $stmt = $pdo->prepare("UPDATE alunos SET nome=?, email=?, telefone=?, data_nascimento=? WHERE id=?");
        $stmt->execute([$nome, $email, $telefone, $data_nascimento, $id]);

        header("Location: alunos.php");
        exit;
    }
?>

<div class="container mt-4">
    <h2>Editar Aluno</h2>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" value="<?= $aluno['nome'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">E-mail:</label>
            <input type="email" name="email" class="form-control" value="<?= $aluno['email'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone:</label>
            <input type="text" name="telefone" class="form-control" value="<?= $aluno['telefone'] ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" class="form-control"
                value="<?= $aluno['data_nascimento'] ?>" required>
        </div>

        <button type="submit" class="btn btn-warning">Atualizar</button>
        <a href="alunos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
