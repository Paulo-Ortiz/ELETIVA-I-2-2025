<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Plataforma de Cursos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #007bff, #6610f2);
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

        <?php
            if(isset($_GET['cadastro'])){
                $cadastro = $_GET['cadastro'];
                if($cadastro){
                    echo "<p class='text-success'>Cadastro realizado com sucesso!</p>";
                } else {
                    echo "<p class='text-danger'>Erro ao realizar o cadastro!</p>";
                }
            }
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                require('conexao.php');
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                try{
                    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
                    $stmt->execute([$email]);
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($usuario && password_verify($senha, $usuario['senha'])){
                        session_start();
                        $_SESSION['acesso'] = true;
                        $_SESSION['nome'] = $usuario['nome'];
                        header('location: principal.php');
                    } else {
                        echo "<p class='text-danger'>Credenciais inválidas!</p>";
                    }
                } catch(\Exception $e){
                    echo "Erro: ".$e->getMessage();
                }
            }
        ?>

    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card p-4">
          <div class="text-center mb-4">
            <img src="https://cdn-icons-png.flaticon.com/512/906/906175.png" alt="Logo" class="logo">
            <h4 class="card-title">Plataforma de Cursos</h4>
            <p class="text-muted">Acesse sua conta para continuar aprendendo 🚀</p>
          </div>
          <form method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="seuemail@exemplo.com" required>
            </div>

            <div class="mb-3">
              <label for="senha" class="form-label">Senha</label>
              <input type="password" name="senha" id="senha" class="form-control" placeholder="********" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-3">Entrar</button>

            <div class="text-center">
              <small class="text-muted">
                Não tem uma conta? <a href="cadastro.php">Cadastre-se</a>
              </small>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
