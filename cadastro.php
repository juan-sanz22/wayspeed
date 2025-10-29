<?php
require 'conexao.php';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = ($_POST['username']);
    $email = ($_POST['email']);
    $hash_senha = ($_POST['senha']);

    if ($username && $email && $hash_senha >= 0) {
        $sql = "INSERT INTO usuarios (username, email, hash_senha) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email, $hash_senha]);
        $msg = "✅ Insumo adicionado com sucesso!";
    } else {
        $msg = "⚠️ Preencha todos os campos corretamente!";
    }
}
?>

<h2>Novo Insumo</h2>
<p><?= $msg ?></p>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WaySpeed - Cadastro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>
    <script>checkAuth();</script>

    <div class="container">
        <!-- Menu Lateral -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>WaySpeed</h1>
                <button class="close-btn">&times;</button>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="horarios.php"><i class="fa-solid fa-clock"></i> Horarios</a></li>
                    <li><a href="monitoramento.php"><i class="fa-solid fa-desktop"></i> Monitoramento</a></li>
                    <li><a href="relatorio.php"><i class="fa-solid fa-receipt"></i> Relatórios</a></li>
                    <li><a href="alertas.php"><i class="fa-solid fa-triangle-exclamation"></i> Alertas</a></li>
                    <li><a href="notificacoes.php"><i class="fas fa-bell"></i> Notificações</a></li>
                </ul>

                <div class="divider"></div>

                <ul>
                    <li><a href="cadastro.php"><i class="fa-solid fa-user-plus"></i> Cadastrar</a></li>
                    <li><a href="funcionarios.php"><i class="fa-solid fa-user"></i> Funcionarios</a></li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <p>&copy; 2025 WaySpeed. Inc.</p>
            </div>
        </aside>

        <!-- Conteúdo Principal -->
        <main class="main-content">
            <header class="header">
                <button class="menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Cadastro</h1>
            </header>

            <div class="form-container">
                <form class="cadastro-form" action="processar.php" method="post">
                    <div class="form-group">
                        <label for="username">Nome de usuário</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm-email">Confirmação email</label>
                        <input type="email" id="confirm-email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="hash_senha" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm-senha">Confirmar senha</label>
                        <input type="password" id="confirm-senha" required>
                    </div>
                    
                    <button type="submit" class="submit-btn">Cadastrar</button>
                </form>
            </div>
        </main>
    </div>

    <script src="scriptmenu.js"></script>
</body>
</html>