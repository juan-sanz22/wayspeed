<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WaySpeed - Notificações</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/notificacoes.css">
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
                <h1><b>Notificações</b></h1>
            </header>

            <div class="notificacoes-container">
                
                <div class="notificacoes-header">
                    <div class="search-bar">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Pesquisar...">
                    </div>
                </div>

                
                <div class="notificacoes-list">
                    
                    <div class="notificacao-item unread">
                        <div class="notificacao-header">
                            <span class="setor">Setor de Administração</span>
                            <span class="time">10:30 AM</span>
                        </div>
                        <h3 class="notificacao-title">Mensagem Teste 1</h3>
                        <div class="notificacao-content">
                            <p><strong>Setor de Administração</strong></p>
                            <p><strong>Mensagem Teste 1</strong></p>
                        </div>
                    </div>

                    
                    <div class="notificacao-item unread">
                        <div class="notificacao-header">
                            <span class="setor">Setor de Administração</span>
                            <span class="time">11:45 AM</span>
                        </div>
                        <h3 class="notificacao-title">Mensagem Teste 1</h3>
                        <div class="notificacao-content">
                            <p><strong>Setor de Administração</strong></p>
                            <p><strong>Mensagem Teste 1</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="scriptmenu.js"></script>
</body>
</html>