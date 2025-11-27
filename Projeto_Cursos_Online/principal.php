<?php
require "conexao.php";

// TOTAL DE ALUNOS
$totalAlunos = $pdo->query("SELECT COUNT(*) FROM alunos")->fetchColumn();

// TOTAL DE CURSOS
$totalCursos = $pdo->query("SELECT COUNT(*) FROM cursos")->fetchColumn();

// TOTAL DE PROFESSORES
$totalProfessores = $pdo->query("SELECT COUNT(*) FROM professores")->fetchColumn();

// TOTAL DE MATRÍCULAS
$totalMatriculas = $pdo->query("SELECT COUNT(*) FROM matriculas")->fetchColumn();

// MATRÍCULAS POR CURSO (PARA GRÁFICO)
$matriculasPorCurso = $pdo->query("
    SELECT cursos.nome AS curso, COUNT(matriculas.id) AS total
    FROM matriculas
    JOIN cursos ON cursos.id = matriculas.curso_id
    GROUP BY cursos.id
")->fetchAll(PDO::FETCH_ASSOC);

// STATUS (ATIVA, CANCELADA, CONCLUÍDA…)
$statusMatriculas = $pdo->query("
    SELECT status, COUNT(*) AS total
    FROM matriculas
    GROUP BY status
")->fetchAll(PDO::FETCH_ASSOC);

session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bem-vindo - Plataforma de Cursos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      font-family: "Poppins", sans-serif;
    }

    .navbar {
      background: linear-gradient(135deg, #007bff, #6610f2);
    }

    .navbar-brand {
      color: #fff !important;
      font-weight: 600;
      font-size: 1.3rem;
    }

    .nav-link {
      color: #fff !important;
      font-weight: 500;
    }

    .welcome-card {
      margin-top: 40px;
      border: none;
      border-radius: 1rem;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .welcome-banner {
      background: linear-gradient(135deg, #6610f2, #007bff);
      color: white;
      padding: 40px 30px;
      border-radius: 1rem 1rem 0 0;
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    footer {
      margin-top: 50px;
      color: #6c757d;
      text-align: center;
      font-size: 0.9rem;
    }

     /* Botão imprimir */
  .btn-print {
    background: rgba(255, 255, 255, 0.25);
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 6px 12px;
    font-weight: 500;
    transition: 0.3s;
  }

  .btn-print:hover {
    background: rgba(255, 255, 255, 0.45);
    transform: translateY(-2px);
    color: #fff;
  }

  /* Esconder botão na impressão */
  @media print {
    .btn-print,
    .navbar {
      display: none !important;
    }
  }
  </style>
</head>
<body>

  <!-- Navbar -->
<nav class="navbar navbar-expand-lg" style="background: linear-gradient(135deg, #007bff, #6610f2);">

<style>
  .navbar .nav-link {
    transition: 0.3s ease;
    padding: 8px 12px;
    border-radius: 8px;
  }

  .navbar .nav-link:hover {
    background: rgba(255, 255, 255, 0.25);
    color: #fff !important;
    transform: translateY(-2px);
  }

  .navbar .btn-light:hover {
    background: #f8f9fa;
    transform: translateY(-2px);
  }
</style>


  <div class="container">

    <!-- Voltar para a tela principal -->
    <a class="navbar-brand" href="principal.php">
      🎓 Plataforma de Cursos
    </a>

    <!-- Botão Mobile -->
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">

      <!-- Menu -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link text-white" href="crud_cursos.php">📚 Cursos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="alunos.php">👨‍🎓 Alunos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="professores.php">👨‍🏫 Professores</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="matriculas.php">📝 Matrículas</a>
        </li>

        <!-- Botão de imprimir -->
        <li class="nav-item">
          <button class="btn-print ms-3" onclick="window.print()">🖨 Imprimir</button>
        </li>

        <li class="nav-item ms-3">
          <a href="logout.php" class="btn btn-light btn-sm">Sair</a>
        </li>

      </ul>
    </div>

  </div>
</nav>

  <!-- Conteúdo principal -->
<div class="container mt-4">

  <h2 class="fw-bold mb-4">📊 Dashboard Geral</h2>

  <!-- CARDS ESTATÍSTICOS -->
  <div class="row g-4">

    <div class="col-md-3">
      <div class="card shadow text-center p-3 border-0" style="border-radius: 15px;">
        <h5 class="text-primary">Alunos</h5>
        <h2 class="fw-bold"><?php echo $totalAlunos; ?></h2>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card shadow text-center p-3 border-0" style="border-radius: 15px;">
        <h5 class="text-success">Cursos</h5>
        <h2 class="fw-bold"><?php echo $totalCursos; ?></h2>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card shadow text-center p-3 border-0" style="border-radius: 15px;">
        <h5 class="text-warning">Professores</h5>
        <h2 class="fw-bold"><?php echo $totalProfessores; ?></h2>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card shadow text-center p-3 border-0" style="border-radius: 15px;">
        <h5 class="text-danger">Matrículas</h5>
        <h2 class="fw-bold"><?php echo $totalMatriculas; ?></h2>
      </div>
    </div>

  </div>

  <!-- GRÁFICOS -->
  <div class="row mt-5">

    <!-- GRÁFICO MATRÍCULAS POR CURSO -->
    <div class="col-md-6">
      <div class="card shadow p-3">
        <h5 class="mb-3">📚 Matrículas por Curso</h5>
        <canvas id="chartCursos"></canvas>
      </div>
    </div>

    <!-- GRÁFICO STATUS -->
    <div class="col-md-6">
      <div class="card shadow p-3">
        <h5 class="mb-3">📌 Status das Matrículas</h5>
        <canvas id="chartStatus"></canvas>
      </div>
    </div>

  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Dados PHP → JS
const cursosLabels = <?php echo json_encode(array_column($matriculasPorCurso, 'curso')); ?>;
const cursosTotals = <?php echo json_encode(array_column($matriculasPorCurso, 'total')); ?>;

const statusLabels = <?php echo json_encode(array_column($statusMatriculas, 'status')); ?>;
const statusTotals = <?php echo json_encode(array_column($statusMatriculas, 'total')); ?>;

// Gráfico 1: Matrículas por curso
new Chart(document.getElementById('chartCursos'), {
    type: 'bar',
    data: {
        labels: cursosLabels,
        datasets: [{
            label: 'Matrículas',
            data: cursosTotals,
            borderWidth: 1
        }]
    }
});

// Gráfico 2: Status das matrículas
new Chart(document.getElementById('chartStatus'), {
    type: 'pie',
    data: {
        labels: statusLabels,
        datasets: [{
            label: 'Status',
            data: statusTotals,
            backgroundColor: [
              '#007bff',
              '#28a745',
              '#dc3545'
            ],
            borderWidth: 1
        }]
    },
});
</script>

    <footer class="mt-5">
      <p>© 2025 Plataforma de Cursos Online - Todos os direitos reservados</p>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
