<?php
session_start();

if (!isset($_SESSION['usuario_id']) || empty($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

require_once "conexao.php";

$stmt = $pdo->prepare("SELECT usuario_id, nome, cargo, email FROM Usuarios ORDER BY nome ASC");
$stmt->execute();
$funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WaySpeed - Funcionários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/funcionarios.css">
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
                <li><a href="funcionarios.php"><i class="fa-solid fa-user"></i>Funcionários</a></li>
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
            <h1><b>Funcionários</b></h1>
        </header>

        <div class="funcionarios-container">

            <section class="novo-section">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Pesquisar..." id="pesquisar">
                </div>
            </section>

            <div class="funcionarios-list" id="listaFuncionarios">

                <?php if (count($funcionarios) > 0): ?>
                    <?php foreach ($funcionarios as $f): ?>
                        <div class="funcionario-card">
                            <div class="funcionario-header">
                                <h3><?= htmlspecialchars($f["cargo"]) ?></h3>
                            </div>
                            <div class="funcionario-info">
                                <p><strong><?= htmlspecialchars($f["nome"]) ?></strong></p>
                                <p>ID: <?= $f["usuario_id"] ?></p>
                                <p>Email: <?= htmlspecialchars($f["email"]) ?></p>
                            </div>

                            <?php if ($_SESSION["cargo"] === "Gerente"): ?>
                                <form action="excluirFuncionario.php" method="POST" class="delete-form" 
                                      onsubmit="return confirm('Tem certeza que deseja excluir este funcionário?');">
                                    <input type="hidden" name="usuario_id" value="<?= $f['usuario_id'] ?>">
                                    <button type="submit" class="delete-btn">
                                        <i class="fa-solid fa-trash"></i> Excluir
                                    </button>
                                </form>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Nenhum funcionário encontrado.</p>
                <?php endif; ?>

            </div>
        </div>
    </main>
</div>

<script src="scriptmenu.js"></script>
</body>
</html>
