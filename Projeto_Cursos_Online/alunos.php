<?php
    require "conexao.php";
    session_start();

    // Consulta dos alunos
    try {
        $stmt = $pdo->query("SELECT * FROM alunos ORDER BY id DESC");
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("Erro ao buscar alunos: " . $e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos - Plataforma de Cursos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            font-family: "Poppins", sans-serif;
        }
        .navbar {
            background: linear-gradient(135deg, #007bff, #6610f2);
        }
        .nav-link, .navbar-brand {
            color: #fff !important;
            font-weight: 500;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="principal.php">🎓 Plataforma de Cursos</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item"><a class="nav-link" href="principal.php">🏠 Principal</a></li>
        <li class="nav-item"><a class="nav-link" href="crud_cursos.php">📚Cursos</a></li>
        <li class="nav-item"><a class="nav-link active fw-bold" href="alunos.php">👨‍🎓Alunos</a></li>
        <li class="nav-item"><a class="nav-link" href="professores.php">👨‍🏫Professores</a></li>
        <li class="nav-item"><a class="nav-link" href="matriculas.php">📝Matrículas</a></li>

        <li class="nav-item"><a class="nav-link text-warning" href="logout.php">Sair</a></li>

      </ul>
    </div>

  </div>
</nav>

<!-- CONTEÚDO -->
<div class="container mt-4">
    <div class="card p-4">
        <h3 class="mb-3">👨‍🎓 Lista de Alunos</h3>

        <a href="aluno_cadastrar.php" class="btn btn-primary mb-3">+ Cadastrar Novo Aluno</a>

        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Nascimento</th>
                    <th>Cadastrado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php if (!empty($alunos)): ?>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?= $aluno["id"] ?></td>
                        <td><?= htmlspecialchars($aluno["nome"]) ?></td>
                        <td><?= htmlspecialchars($aluno["email"]) ?></td>
                        <td><?= htmlspecialchars($aluno["telefone"]) ?></td>
                        <td><?= $aluno["data_nascimento"] ?></td>
                        <td><?= $aluno["data_cadastro"] ?></td>
                        <td>
                            <a href="aluno_editar.php?id=<?= $aluno['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="aluno_excluir.php?id=<?= $aluno['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Excluir aluno?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7" class="text-center text-muted">Nenhum aluno encontrado.</td></tr>
            <?php endif; ?>

            </tbody>
        </table>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


