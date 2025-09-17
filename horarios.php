<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WaySpeed - Horários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/horarios.css">
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

        <!-- Conteúdo Principal -->
        <main class="main-content">
            <header class="header">
                <button class="menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
                <h1>Horários</h1>
            </header>

            <div class="rotas-container">
                <h2>Rotas Disponíveis</h2>
                <ul class="rotas-list">
                    <li><a href="mapa.php"><i class="fa-solid fa-chevron-down"></i> Rota Central</a></li>
                    <li><a href="mapa.php"><i class="fa-solid fa-chevron-down"></i> Rota Norte</a></li>
                    <li><a href="mapa.php"><i class="fa-solid fa-chevron-down"></i> Rota Iririu</a></li>
                    <li><a href="mapa.php"><i class="fa-solid fa-chevron-down"></i> Rota Itaum</a></li>
                    <li><a href="mapa.php"><i class="fa-solid fa-chevron-down"></i> Rota Vila Nova</a></li>
                    <li><a href="mapa.php"><i class="fa-solid fa-chevron-down"></i> Rota Sul</a></li>
                    <li><a href="mapa.php"><i class="fa-solid fa-chevron-down"></i> Rota Tupy</a></li>
                    <li><a href="mapa.php"><i class="fa-solid fa-chevron-down"></i> Rota Guanabara</a></li>
                    <li><a href="mapa.php"><i class="fa-solid fa-chevron-down"></i> Rota Pirabeiraba</a></li>
                </ul>
            </div>
        </main>
    </div>

    <script src="scriptmenu.js"></script>
</body>
</html>