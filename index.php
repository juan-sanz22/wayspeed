<?php
include('conexao.php'); 
session_start();

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome  = trim($_POST['username'] ?? '');
    $senha = $_POST['password'] ?? '';

    if (empty($nome) || empty($senha)) {
        $erro = "Preencha todos os campos.";
    } else {

        $stmt = $pdo->prepare("SELECT usuario_id, nome, senha, cargo FROM Usuarios WHERE nome = ?");
        $stmt->execute([$nome]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            if (password_verify($senha, $usuario['senha'])) {

                $_SESSION['usuario_id'] = $usuario['usuario_id'];
                $_SESSION['nome']       = $usuario['nome'];
                $_SESSION['cargo']      = $usuario['cargo'];

                header("Location: dashboard.php");
                exit();

            } else {
                $erro = "Senha incorreta.";
            }
        } else {
            $erro = "Usuário não encontrado.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login WaySpeed</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="login-container">
        <h1>LOGIN</h1>

        <form method="POST">

            <div class="form-group">
                <label for="username">Nome de usuário</label>
                <input type="text" id="username" name="username" placeholder="Nome de Usuário" required>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Senha" required style="width: 100%; padding-right: 40px;">
                    <button type="button" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; font-size: 18px;">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <?php if (!empty($erro)): ?>
                <div class="login-erro"><?= htmlspecialchars($erro) ?></div>
            <?php endif; ?>

            <button type="submit" class="btn-login">Login</button>

        </form>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            togglePassword.innerHTML = type === 'password' 
                ? '<i class="fas fa-eye"></i>' 
                : '<i class="fas fa-eye-slash"></i>';
        });
    </script>

</body>
</html>