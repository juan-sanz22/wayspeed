<?php
session_start();

if (!isset($_SESSION['usuario_id']) || $_SESSION['cargo'] !== 'Gerente') {
    header("Location: dashboard.php");
    exit();
}

require 'conexao.php';

$msg = '';
$msg_class = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $cargo = $_POST['tipo'] ?? '';

    if ($username && $email && $senha && $cargo) {
        $sql_check = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->execute([$email]);
        $existe = $stmt_check->fetchColumn();

        if ($existe > 0) {
            $msg = "Este e-mail já está cadastrado!";
            $msg_class = "error";
        } else {
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (nome, email, senha, cargo) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$username, $email, $senha_hash, $cargo]);
            $msg = "Cadastro adicionado com sucesso!";
            $msg_class = "success";
        }
    } else {
        $msg = "Preencha todos os campos corretamente!";
        $msg_class = "error";
    }
}
?>

 
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

    <div class="container">
        <aside class="sidebar">
            <div class="sidebar-header">
                <h1>WaySpeed</h1>
                <button class="close-btn">&times;</button>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="dashboard.php"><i class="fa-solid fa-house"></i>Dashboard</a></li>
                    <li><a href="rotas.php"><i class="fa-solid fa-clock"></i>Rotas</a></li>
                    <li><a href="monitoramento.php"><i class="fa-solid fa-desktop"></i>Monitoramento</a></li>
                    <li><a href="relatorio.php"><i class="fa-solid fa-receipt"></i>Relatórios</a></li>
                    <li><a href="notificacoes.php"><i class="fas fa-bell"></i> Notificações</a></li>
                </ul>

                <div class="divider"></div>

                <ul>
                    <li><a href="cadastro.php"><i class="fa-solid fa-user-plus"></i>Cadastrar</a></li>
                    <li><a href="funcionarios.php"><i class="fa-solid fa-user"></i>Funcionarios</a></li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <p>&copy; 2025 WaySpeed. Inc.</p>
            </div>
        </aside>

        
        <main class="main-content">
            <header class="header">
                <button class="menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
                <h1><b>Cadastro</b></h1>
            </header>

            <div class="form-container">
            <?php if (!empty($msg)) : ?>
                <p class="msg"><?= $msg ?></p>
            <?php endif; ?>

                <form class="cadastro-form" method="POST" action="cadastro.php">
                    <div class="form-group">
                        <label for="username">Nome de usuário</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo">Cargo</label>
                    <select id="cargo" name="tipo" required>
                        <option value="">Selecione o cargo</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Operador">Operador</option>
                    </select>
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
                        <input type="password" id="senha" name="senha" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-senha">Confirmar senha</label>
                        <input type="password" id="confirm-senha" required>
                    </div>
                    <hr>
                    <br>
                    <div class="form-group">
                        <label for="confirm-cep">CEP</label>
                        <input type="cep" id="confirm-cep" required>
                    </div>
                    <div class="form-group">
                        <label for="logradouro">Logradouro / Nome</label>
                        <input type="name" id="logradouro" required>
                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="name" id="bairro" required>
                    </div>
                    <div class="form-group">
                        <label for="localidade">Localidade / UF</label>
                        <input type="name" id="localidade" required>
                    </div>
                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input type="number" id="numero" required>
                    </div>
                    <button type="submit" class="submit-btn">Cadastrar</button>
                </form>
            </div>
        </main>
    </div>

    <script src="script.js"></script>
</body>
</html>