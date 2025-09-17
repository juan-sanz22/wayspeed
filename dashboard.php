<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WaySpeed Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
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

        <main class="main-content">
            <header class="header">
                <button class="menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
                <h1><b>Dashboard</b></h1>
            </header>

            <div class="dashboard-grid">
                <!-- Seção Alertas -->
                <section class="card alertas">
                    <h2>Alertas</h2>
                    <div class="stats-container">
                        <div class="stat-item">
                            <div class="stat-number">14</div>
                            <div class="stat-label">Concluídas</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">20</div>
                            <div class="stat-label">Alertas</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">41</div>
                            <div class="stat-label">Graves</div>
                        </div>
                    </div>
                </section>

                <!-- Seção Relatório -->
                <section class="card relatorio">
                    <h2>Relatório</h2>
                    <div class="stats-container">
                        <div class="stat-item">
                            <div class="stat-number">24</div>
                            <div class="stat-label">Concluídas</div>
                        </div>
                    </div>
                    <div class="progress-bars">
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 80%"></div>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 60%"></div>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 20%"></div>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                    </div>
                    <div class="progress-bars">
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 90%"></div>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 60%"></div>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 40%"></div>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 20%"></div>
                        </div>
                        <div class="progress-container">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                    </div>
                </section>

                <!-- Seção Horários -->
                <section class="card horarios">
                    <h2>Horários</h2>
                    <div class="horarios-content">
                        <h3>Mais Movimentadas</h3>
                        <div class="rota">Tupy / Norte via Centro</div>
                        <div class="rota">Norte / Centro</div>
                    </div>
                </section>

                <!-- Seção Monitoramento -->
                <section class="card monitoramento">
                    <h2>Monitoramento</h2>
                    <div class="stats-container">
                        <div class="stat-item">
                            <div class="stat-number">30</div>
                            <div class="stat-label">Trens</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">57</div>
                            <div class="stat-label">Estações</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">34</div>
                            <div class="stat-label">Estações</div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script src="scriptmenu.js"></script>
</body>

</html>