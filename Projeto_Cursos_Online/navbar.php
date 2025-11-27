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

  <div class="container">
    <a class="navbar-brand text-white fw-bold" href="principal.php">🎓 Plataforma de Cursos</a>

    <button class="navbar-toggler text-white border-white" type="button" 
            data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item">
          <a class="nav-link text-white" href="principal.php">🏠 Principal</a>
        </li>

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

        <li class="nav-item">
          <a href="logout.php" class="btn btn-light btn-sm ms-3">Sair</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
