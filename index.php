<?php
include('conexao.php'); 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome = $_POST['username'] ?? '';
    $senha = $_POST['password'] ?? '';

    if (empty($nome) || empty($senha)) {
        echo "<p style='color:red;'>Preencha todos os campos.</p>";
    } else {
        
        $stmt = $pdo->prepare("SELECT usuario_id, nome, senha FROM Usuarios WHERE nome = ?");
        $stmt->execute([$nome]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            
            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario_id'] = $usuario['usuario_id'];
                $_SESSION['nome'] = $usuario['nome'];
                
                header("Location: dashboard.php");
                exit;
            } else {
                echo "<p style='color:red;'>Senha incorreta.</p>";
            }
        } else {
            echo "<p style='color:red;'>Usuário não encontrado.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <h1>LOGIN</h1>
        <form id="loginForm" method="POST">
            <div class="form-group">
                <label for="username">Nome de usuário</label>
                <input type="text" id="username" name="username" placeholder="Nome de Usuário" required>
            </div>
            
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="Senha" required>
            </div>
            
            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</body>
</html>
