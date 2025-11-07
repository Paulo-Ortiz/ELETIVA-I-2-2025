<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Plataforma de Cursos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #6610f2, #007bff);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .card-title {
      font-weight: 700;
      color: #333;
    }

    .btn-primary {
      background: #007bff;
      border: none;
      font-weight: 600;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background: #0056b3;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .logo {
      width: 80px;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card p-4">
          <div class="text-center mb-4">
            <img src="https://cdn-icons-png.flaticon.com/512/906/906175.png" alt="Logo" class="logo">
            <h4 class="card-title">Crie sua conta</h4>
            <p class="text-muted">Comece sua jornada de aprendizado 📚</p>
          </div>

          <form action="cadastro.php" method="POST">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome completo</label>
              <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="seuemail@exemplo.com" required>
            </div>

            <div class="mb-3">
              <label for="senha" class="form-label">Senha</label>
              <input type="password" name="senha" id="senha" class="form-control" placeholder="Crie uma senha" required>
            </div>

            <div class="mb-3">
              <label for="confirmar" class="form-label">Confirmar senha</label>
              <input type="password" name="confirmar" id="confirmar" class="form-control" placeholder="Repita a senha" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">Cadastrar</button>

            <div class="text-center">
              <small class="text-muted">
                Já tem uma conta? <a href="index.php">Entre aqui</a>
              </small>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require("conexao.php");
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

        try{
            $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
            if($stmt->execute([$nome, $email, $senha])){
                header("location: index.php?cadastro=true");
            } else{
                header("location: index.php?cadastro=false");
            }
        } catch(Exception $e){
            echo "Erro ao executar o comando SQL: ".$e->getMessage();
        }

    }

    ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
