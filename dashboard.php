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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WaySpeed Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
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
                <h1><b>Dashboard</b></h1>
            </header>

            <div class="dashboard-grid">

                <!-- NOVA SESSÃO: MONITORAMENTO DAS ROTAS -->
                <section class="card monitoramento-rotas">
                    <h2>Monitoramento</h2>
                    <div class="stats-container" style="display: flex; flex-direction: column; gap: 20px;">
                        <div class="stat-item">
                            <div class="stat-label">Rota Sul</div>
                            <div class="stat-number status ativo">Ativa</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-label">Rota Norte</div>
                            <div class="stat-number status inativa">Inativa</div>
                        </div>
                    </div>
                </section>

                <!-- RELATÓRIO (MANTIDO) -->
                <section class="card relatorio">
                    <h2>Relatórios</h2>

                    <div class="relatorio-lista">
                        <div class="relatorio-item andamento">
                            <span class="rota-text">Rota Norte - Em andamento</span>
                            <span class="rota-horario">08:32</span>
                        </div>

                        <div class="relatorio-item concluida">
                            <span class="rota-text">Rota Norte - Concluída</span>
                            <span class="rota-horario">08:32</span>
                        </div>
                    </div>
                </section>


                <!-- HORÁRIOS (MANTIDO) -->
                <section class="card horarios">
                    <h2>Rotas</h2>
                    <div class="horarios-content">
                        <h3>Mais Movimentadas</h3>
                        <div class="rota">Sul / Norte</div>
                        <div class="rota">Norte / Sul</div>
                    </div>
                </section>

                <!-- MONITORAMENTO GERAL (AJUSTADO) -->
                <section class="card monitoramento">
                    <h2>Monitoramento</h2>
                    <div class="stats-container">
                        <div class="stat-item">
                            <div class="stat-number">1</div>
                            <div class="stat-label">Trens</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">1</div>
                            <div class="stat-label">Estações</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">Ativa</div>
                            <div class="stat-label">Iluminacao</div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script src="scriptmenu.js"></script>
</body>
</html>