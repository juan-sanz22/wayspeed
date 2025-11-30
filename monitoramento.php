<?php
session_start();

if (!isset($_SESSION['usuario_id']) || empty($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}

require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WaySpeed - Monitoramento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/monitoramento.css">
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
                    <?php if ($_SESSION['cargo'] === 'Gerente'): ?>
                        <li><a href="cadastro.php"><i class="fa-solid fa-user-plus"></i>Cadastrar</a></li>
                    <?php endif; ?>

                    <li><a href="funcionarios.php"><i class="fa-solid fa-user"></i>Funcionarios</a></li>
                </ul>
                <div class="divider"></div>
                <ul>
                   <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></li>
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
                <h1><b>Monitoramento</b></h1>
            </header>
            <div class="monitoramento-container">
                <section class="status-section">
                    <h2>Status Rotas</h2>
                    <div class="status-card">
                        <div class="status-item">
                            <span class="status-label">Status Rota - Sul</span>
                            <span class="status-value positivo">Ativa</span>
                        </div>
                        <div class="status-item">
                            <span class="status-label">Status Rota - Norte</span>
                            <span class="status-value negativo">Inativa</span>
                        </div>
                    </div>
                </section>
                <section class="estacoes-section">
                    <h2>Sensores de Presenças</h2>
                    <div class="estacao-card">
                        <div class="estacao-info">
                            <span class="estacao-nome">Sensor Presença 1</span>
                        </div>
                        <div class="status-indicador atrasado"></div>
                    </div>
                    <div class="estacao-card">
                        <div class="estacao-info">
                            <span class="estacao-nome">Sensor Presença 2</span>
                        </div>
                        <div class="status-indicador normal"></div>
                    </div>
                    <div class="estacao-card">
                        <div class="estacao-info">
                            <span class="estacao-nome">Sensor Presença 3</span>
                        </div>
                        <div class="status-indicador atrasado"></div>
                    </div>
                    <div class="estacao-card">
                        <div class="estacao-info">
                            <span class="estacao-nome">Sensor Presença 4</span>
                        </div>
                        <div class="status-indicador atrasado"></div>
                    </div>
                </section>
                <section class="estacoes-section">
                    <h2>Sensores de Luz</h2>
                    <div class="estacao-card">
                        <div class="estacao-info">
                            <span class="estacao-nome">Sensor Luz</span>
                        </div>
                        <div class="status-indicador normal"></div>
                    </div>
                </section>
                <section class="estacoes-section">
                    <h2>Iluminação</h2>
                    <div class="estacao-card">
                        <div class="estacao-info">
                            <span class="estacao-nome">Luz 1</span>
                        </div>
                        <div class="status-indicador normal"></div>
                    </div>
                                        <div class="estacao-card">
                        <div class="estacao-info">
                            <span class="estacao-nome">Luz 2</span>
                        </div>
                        <div class="status-indicador normal"></div>
                    </div>
                                        <div class="estacao-card">
                        <div class="estacao-info">
                            <span class="estacao-nome">Luz 3</span>
                        </div>
                        <div class="status-indicador normal"></div>
                    </div>
                </section>
            </div>
        </main>
    </div>
    <script src="scriptmenu.js"></script>
</body>
</html>