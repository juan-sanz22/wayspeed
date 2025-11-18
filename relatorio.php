<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WaySpeed - Relatório</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/relatorio.css">
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
                <h1><b>Relatório</b></h1>
            </header>

            <div class="relatorio-container">
                <section class="trens-section">
                    <h2>Trens em Operação</h2>
                    <div class="trens-list">
                        <div class="trem-item">Trem 2008</div>
                    </div>
                </section>

                <div class="divider-horizontal"></div>

                <section class="rotas-section">
                    <h2>Rotas Concluídas</h2>
                    <div class="rotas-list">
                        <div class="rota-item">
                            <label class="checkbox-container">
                                <input type="checkbox" disabled>
                                <span class="checkmark"></span>
                                <span class="rota-text">Rota Sul - Em adamento</span>
                                <span class="rota-horario">07:45</span>
                            </label>
                        </div>
                        <div class="rota-item">
                            <label class="checkbox-container">
                                <input type="checkbox" checked disabled>
                                <span class="checkmark"></span>
                                <span class="rota-text">Rota Norte - Concluida</span>
                                <span class="rota-horario">08:32</span>
                            </label>
                        </div>
                        <div class="rota-item">
                            <label class="checkbox-container">
                                <input type="checkbox" checked disabled>
                                <span class="checkmark"></span>
                                <span class="rota-text">Rota Norte - Concluida</span>
                                <span class="rota-horario">09:09</span>
                            </label>
                        </div>
                        <div class="rota-item">
                            <label class="checkbox-container">
                                <input type="checkbox" checked disabled>
                                <span class="checkmark"></span>
                                <span class="rota-text">Rota Norte - Concluida</span>
                                <span class="rota-horario">09:10</span>
                            </label>
                        </div>
                        <div class="rota-item">
                            <label class="checkbox-container">
                                <input type="checkbox" checked disabled>
                                <span class="checkmark"></span>
                                <span class="rota-text">Rota Sul - Concluida</span>
                                <span class="rota-horario">10:23</span>
                            </label>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <script src="scriptmenu.js"></script>
</body>
</html>