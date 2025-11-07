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
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">🎓 Plataforma de Cursos</a>
      <div class="ms-auto">
        <a href="logout.php" class="btn btn-light btn-sm">Sair</a>
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
