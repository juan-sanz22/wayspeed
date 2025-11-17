<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WaySpeed - Alertas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/alertas.css">
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
                <h1><b>Alertas</b></h1>
            </header>

            <div class="alertas-container">
                <section class="estatisticas-alertas">
                    <div class="estatistica-item">
                        <div class="numero-alerta">14</div>
                        <div class="rotulo-alerta">Concluídos</div>
                    </div>
                    <div class="estatistica-item">
                        <div class="numero-alerta">20</div>
                        <div class="rotulo-alerta">Alertas</div>
                    </div>
                    <div class="estatistica-item grave">
                        <div class="numero-alerta">41</div>
                        <div class="rotulo-alerta">Graves</div>
                    </div>
                </section>

                <div class="divider-horizontal"></div>

                <section class="novos-alertas">
                    <h2>Novos Alerta...</h2>
                    <div class="lista-alertas">
                        <div class="alerta-item">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                <span class="texto-alerta">Alerta resolvido com sucesso!</span>
                            </label>
                        </div>
                        <div class="alerta-item ativo">
                            <label class="checkbox-container">
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                                <span class="texto-alerta">Fique ligado tem um alerta para resolver (explicação alerta)</span>
                            </label>
                        </div>
                        <div class="alerta-item">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                <span class="texto-alerta">PERIGO, tome cuidado!</span>
                            </label>
                        </div>
                        <div class="alerta-item">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                <span class="texto-alerta">Alerta resolvido com sucesso!</span>
                            </label>
                        </div>
                        <div class="alerta-item ativo">
                            <label class="checkbox-container">
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                                <span class="texto-alerta">Fique ligado tem um alerta para resolver (explicação alerta)</span>
                            </label>
                        </div>
                        <div class="alerta-item">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                <span class="texto-alerta">PERIGO, tome cuidado!</span>
                            </label>
                        </div>
                        <div class="alerta-item">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                <span class="texto-alerta">Alerta resolvido com sucesso!</span>
                            </label>
                        </div>
                        <div class="alerta-item">
                            <label class="checkbox-container">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                                <span class="texto-alerta">Fique ligado tem um alerta para resolver (explicação alerta)</span>
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