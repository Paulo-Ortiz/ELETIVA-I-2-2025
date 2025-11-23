<?php
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

        <li class="nav-item ms-3">
          <a href="logout.php" class="btn btn-light btn-sm">Sair</a>
        </li>

      </ul>
    </div>

  </div>
</nav>

  <!-- Conteúdo principal -->
  <div class="container">
    <div class="card welcome-card">
      <div class="welcome-banner">
        <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>! 👋</h2>
        <p>É ótimo ter você de volta! Continue seu aprendizado e descubra novos cursos.</p>
      </div>
      <div class="card-body">
        <h5 class="card-title">📚 Meus Cursos</h5>
        <p class="card-text text-muted">Aqui você verá os cursos em andamento e novas recomendações.</p>

        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <img src="https://cdn-icons-png.flaticon.com/512/1828/1828961.png" class="card-img-top p-4" alt="Curso">
              <div class="card-body text-center">
                <h5 class="card-title">Introdução à Economia</h5>
                <p class="card-text">Aprenda os fundamentos econômicos com exemplos práticos.</p>
                <a href="#" class="btn btn-primary">Continuar</a>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <img src="https://cdn-icons-png.flaticon.com/512/2989/2989838.png" class="card-img-top p-4" alt="Curso">
              <div class="card-body text-center">
                <h5 class="card-title">Finanças para Devs</h5>
                <p class="card-text">Entenda o mercado financeiro e aplique na área de tecnologia.</p>
                <a href="#" class="btn btn-primary">Continuar</a>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <img src="https://cdn-icons-png.flaticon.com/512/1828/1828919.png" class="card-img-top p-4" alt="Curso">
              <div class="card-body text-center">
                <h5 class="card-title">Tokenização e Blockchain</h5>
                <p class="card-text">Explore os novos modelos econômicos digitais e o futuro do mercado.</p>
                <a href="#" class="btn btn-primary">Começar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="mt-5">
      <p>© 2025 Plataforma de Cursos Online - Todos os direitos reservados</p>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
