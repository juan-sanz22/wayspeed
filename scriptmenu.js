document.addEventListener('DOMContentLoaded', function () {
    const menuBtn = document.querySelector('.menu-btn');
    const closeBtn = document.querySelector('.close-btn');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');

    // Toggle sidebar
    menuBtn.addEventListener('click', function () {
        sidebar.classList.toggle('active');
    });

    // Close sidebar
    closeBtn.addEventListener('click', function () {
        sidebar.classList.remove('active');
    });

    // Close sidebar when clicking outside
    document.addEventListener('click', function (event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnMenuBtn = event.target === menuBtn || menuBtn.contains(event.target);

        if (!isClickInsideSidebar && !isClickOnMenuBtn && sidebar.classList.contains('active')) {
            sidebar.classList.remove('active');
        }
    });

    // Prevent sidebar close when clicking inside
    sidebar.addEventListener('click', function (event) {
        event.stopPropagation();
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Elementos do DOM
    const menuBtn = document.querySelector('.menu-btn');
    const closeBtn = document.querySelector('.close-btn');
    const sidebar = document.querySelector('.sidebar');
    
    // Abrir menu lateral
    menuBtn.addEventListener('click', function() {
        sidebar.classList.add('active');
    });
    
    // Fechar menu lateral
    closeBtn.addEventListener('click', function() {
        sidebar.classList.remove('active');
    });
    
    // Fechar menu ao clicar fora
    document.addEventListener('click', function(event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnMenuBtn = event.target === menuBtn || menuBtn.contains(event.target);
        
        if (!isClickInsideSidebar && !isClickOnMenuBtn) {
            sidebar.classList.remove('active');
        }
    });
    
    // Simular atualização de rotas concluídas
    function simularAtualizacaoRotas() {
        const rotas = document.querySelectorAll('.rota-item');
        const primeiraRota = rotas[0];
        const checkbox = primeiraRota.querySelector('input[type="checkbox"]');
        
        // Alternar status da primeira rota para demonstração
        if (checkbox.checked) {
            checkbox.checked = false;
            primeiraRota.querySelector('.rota-text').style.color = '#95a5a6';
            primeiraRota.querySelector('.checkmark').style.backgroundColor = '#eee';
        } else {
            checkbox.checked = true;
            primeiraRota.querySelector('.rota-text').style.color = 'inherit';
            primeiraRota.querySelector('.checkmark').style.backgroundColor = 'var(--status-completo)';
        }
    }
    
    // Atualizar status a cada 5 segundos (apenas para demonstração)
    setInterval(simularAtualizacaoRotas, 5000);
});

document.addEventListener('DOMContentLoaded', function() {
    // Elementos do DOM
    const menuBtn = document.querySelector('.menu-btn');
    const closeBtn = document.querySelector('.close-btn');
    const sidebar = document.querySelector('.sidebar');
    const checkboxes = document.querySelectorAll('.checkbox-container input');
    
    // Abrir menu lateral
    menuBtn.addEventListener('click', function() {
        sidebar.classList.add('active');
    });
    
    // Fechar menu lateral
    closeBtn.addEventListener('click', function() {
        sidebar.classList.remove('active');
    });
    
    // Fechar menu ao clicar fora
    document.addEventListener('click', function(event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnMenuBtn = event.target === menuBtn || menuBtn.contains(event.target);
        
        if (!isClickInsideSidebar && !isClickOnMenuBtn) {
            sidebar.classList.remove('active');
        }
    });
    
    // Controle dos checkboxes de alerta
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const alertaItem = this.closest('.alerta-item');
            if (this.checked) {
                alertaItem.classList.remove('ativo');
                alertaItem.style.opacity = '0.7';
                
                // Simular atualização de estatísticas
                const concluidos = document.querySelector('.estatistica-item:first-child .numero-alerta');
                concluidos.textContent = parseInt(concluidos.textContent) + 1;
                
                const alertas = document.querySelector('.estatistica-item:nth-child(2) .numero-alerta');
                alertas.textContent = parseInt(alertas.textContent) - 1;
            } else {
                alertaItem.classList.add('ativo');
                alertaItem.style.opacity = '1';
                
                // Simular atualização de estatísticas
                const concluidos = document.querySelector('.estatistica-item:first-child .numero-alerta');
                concluidos.textContent = parseInt(concluidos.textContent) - 1;
                
                const alertas = document.querySelector('.estatistica-item:nth-child(2) .numero-alerta');
                alertas.textContent = parseInt(alertas.textContent) + 1;
            }
        });
    });
    
    // Simular novo alerta (para demonstração)
    function simularNovoAlerta() {
        const listaAlertas = document.querySelector('.lista-alertas');
        const novoAlerta = document.createElement('div');
        novoAlerta.className = 'alerta-item ativo';
        novoAlerta.innerHTML = `
            <label class="checkbox-container">
                <input type="checkbox">
                <span class="checkmark"></span>
                <span class="texto-alerta">Novo alerta gerado em ${new Date().toLocaleTimeString()}</span>
            </label>
        `;
        
        listaAlertas.prepend(novoAlerta);
        
        // Atualizar contador
        const alertas = document.querySelector('.estatistica-item:nth-child(2) .numero-alerta');
        alertas.textContent = parseInt(alertas.textContent) + 1;
        
        // Adicionar evento ao novo checkbox
        novoAlerta.querySelector('input').addEventListener('change', function() {
            this.closest('.alerta-item').classList.remove('ativo');
        });
    }
    
    // Simular novo alerta a cada 10 segundos (apenas para demonstração)
    setInterval(simularNovoAlerta, 10000);
});

document.addEventListener('DOMContentLoaded', function() {
    // Elementos do DOM
    const menuBtn = document.querySelector('.menu-btn');
    const closeBtn = document.querySelector('.close-btn');
    const sidebar = document.querySelector('.sidebar');
    const form = document.querySelector('.cadastro-form');
    
    // Abrir menu lateral
    menuBtn.addEventListener('click', function() {
        sidebar.classList.add('active');
    });
    
    // Fechar menu lateral
    closeBtn.addEventListener('click', function() {
        sidebar.classList.remove('active');
    });
    
    // Fechar menu ao clicar fora
    document.addEventListener('click', function(event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnMenuBtn = event.target === menuBtn || menuBtn.contains(event.target);
        
        if (!isClickInsideSidebar && !isClickOnMenuBtn) {
            sidebar.classList.remove('active');
        }
    });
    
    // Validação do formulário
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Obter valores dos campos
        const email = document.getElementById('email').value;
        const confirmEmail = document.getElementById('confirm-email').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;
        
        // Validar emails iguais
        if (email !== confirmEmail) {
            alert('Os emails não coincidem!');
            return;
        }
        
        // Validar senhas iguais
        if (password !== confirmPassword) {
            alert('As senhas não coincidem!');
            return;
        }
        
        // Validar força da senha (exemplo simples)
        if (password.length < 6) {
            alert('A senha deve ter pelo menos 6 caracteres!');
            return;
        }
        
        // Se tudo estiver válido
        alert('Cadastro realizado com sucesso!');
        form.reset();
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Elementos do DOM
    const menuBtn = document.querySelector('.menu-btn');
    const closeBtn = document.querySelector('.close-btn');
    const sidebar = document.querySelector('.sidebar');
    const filterTabs = document.querySelectorAll('.filter-tab');
    const notificacaoItems = document.querySelectorAll('.notificacao-item');
    
    // Abrir menu lateral
    menuBtn.addEventListener('click', function() {
        sidebar.classList.add('active');
    });
    
    // Fechar menu lateral
    closeBtn.addEventListener('click', function() {
        sidebar.classList.remove('active');
    });
    
    // Fechar menu ao clicar fora
    document.addEventListener('click', function(event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnMenuBtn = event.target === menuBtn || menuBtn.contains(event.target);
        
        if (!isClickInsideSidebar && !isClickOnMenuBtn) {
            sidebar.classList.remove('active');
        }
    });
    
    // Alternar entre abas de filtro
    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            filterTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
            
            // Simular filtragem
            const filterType = this.textContent.trim();
            notificacaoItems.forEach(item => {
                if (filterType === 'Todas') {
                    item.style.display = 'block';
                } else if (filterType === 'Não Lidas') {
                    item.style.display = item.classList.contains('unread') ? 'block' : 'none';
                }
            });
        });
    });
    
    // Marcar notificação como lida ao clicar
    notificacaoItems.forEach(item => {
        item.addEventListener('click', function() {
            this.classList.remove('unread');
        });
    });
    
    // Simular novas notificações (para demonstração)
    function simularNovaNotificacao() {
        const notificacoesList = document.querySelector('.notificacoes-list');
        const newNotificacao = document.createElement('div');
        newNotificacao.className = 'notificacao-item unread';
        newNotificacao.innerHTML = `
            <div class="notificacao-header">
                <span class="setor">Setor de Administração</span>
                <span class="time">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</span>
            </div>
            <h3 class="notificacao-title">Nova Mensagem</h3>
            <div class="notificacao-content">
                <p><strong>Setor de Administração</strong></p>
                <p><strong>Esta é uma nova notificação</strong></p>
            </div>
        `;
        
        notificacoesList.prepend(newNotificacao);
        
        // Adicionar evento de clique à nova notificação
        newNotificacao.addEventListener('click', function() {
            this.classList.remove('unread');
        });
    }
    
    // Simular nova notificação a cada 15 segundos (apenas para demonstração)
    setInterval(simularNovaNotificacao, 15000);
});

document.addEventListener('DOMContentLoaded', function() {
    // Elementos do DOM
    const menuBtn = document.querySelector('.menu-btn');
    const closeBtn = document.querySelector('.close-btn');
    const sidebar = document.querySelector('.sidebar');
    const addBtn = document.querySelector('.add-btn');
    const editBtns = document.querySelectorAll('.edit-btn');
    
    // Abrir menu lateral
    menuBtn.addEventListener('click', function() {
        sidebar.classList.add('active');
    });
    
    // Fechar menu lateral
    closeBtn.addEventListener('click', function() {
        sidebar.classList.remove('active');
    });
    
    // Fechar menu ao clicar fora
    document.addEventListener('click', function(event) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnMenuBtn = event.target === menuBtn || menuBtn.contains(event.target);
        
        if (!isClickInsideSidebar && !isClickOnMenuBtn) {
            sidebar.classList.remove('active');
        }
    });
    
    // Adicionar novo funcionário
    addBtn.addEventListener('click', function() {
        // Aqui você pode adicionar lógica para abrir um modal de cadastro
        alert('Funcionalidade de adicionar novo funcionário');
    });
    
    // Editar funcionário
    editBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const card = this.closest('.funcionario-card');
            const nome = card.querySelector('h3').textContent;
            
            // Aqui você pode adicionar lógica para editar o funcionário
            alert(`Editar funcionário: ${nome}`);
        });
    });
    
    // Pesquisa de funcionários
    const searchInput = document.querySelector('.search-box input');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const cards = document.querySelectorAll('.funcionario-card');
        
        cards.forEach(card => {
            const nome = card.querySelector('h3').textContent.toLowerCase();
            if (nome.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
    
    // Simular clique nos cards (para demonstração)
    const cards = document.querySelectorAll('.funcionario-card');
    cards.forEach(card => {
        card.addEventListener('click', function() {
            const nome = this.querySelector('h3').textContent;
            console.log(`Funcionário selecionado: ${nome}`);
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const createAccountLink = document.getElementById('createAccount');
    
    // Simulação de usuários válidos (em um sistema real, isso viria de um backend)
    const validUsers = {
        funcionario: { password: 'func123', access: ['dashboard', 'horarios', 'monitoramento'] },
        supervisor: { password: 'sup123', access: ['dashboard', 'alertas', 'cadastro', 'funcionarios', 'horarios', 'monitoramento', 'notificacoes', 'relatorio'] }
    };
    
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        const userType = document.getElementById('userType').value;
        
        // Validação básica
        if (!username || !password || !userType) {
            showError('Por favor, preencha todos os campos.');
            return;
        }
        
        // Verifica se o usuário e senha são válidos
        if (validUsers[userType] && password === validUsers[userType].password) {
            // Salva no localStorage (simulando autenticação)
            localStorage.setItem('isAuthenticated', 'true');
            localStorage.setItem('userType', userType);
            
            // Redireciona para o dashboard
            window.location.href = 'dashboard.html';
        } else {
            showError('Usuário ou senha incorretos.');
        }
    });
    
    createAccountLink.addEventListener('click', function(e) {
        e.preventDefault();
        const userType = document.getElementById('userType').value;
        
        if (userType !== 'supervisor') {
            showError('Apenas supervisores podem criar contas.');
        } else {
            // Redireciona para a página de cadastro (que será protegida)
            window.location.href = 'cadastro.html';
        }
    });
    
    function showError(message) {
        // Remove mensagens de erro anteriores
        const existingError = document.querySelector('.error-message');
        if (existingError) {
            existingError.remove();
        }
        
        // Cria nova mensagem de erro
        const errorElement = document.createElement('div');
        errorElement.className = 'error-message';
        errorElement.textContent = message;
        
        // Insere após o botão de login
        const loginButton = document.querySelector('.btn-login');
        loginButton.parentNode.insertBefore(errorElement, loginButton.nextSibling);
        
        // Mostra a mensagem
        errorElement.style.display = 'block';
    }
});

// Proteção de páginas (deve ser incluído em todas as páginas, exceto index.html)
function checkAuth() {
    const isAuthenticated = localStorage.getItem('isAuthenticated');
    const userType = localStorage.getItem('userType');
    
    if (!isAuthenticated) {
        window.location.href = 'index.html';
        return;
    }
    
    // Verifica se o usuário tem acesso à página atual
    const currentPage = window.location.pathname.split('/').pop().replace('.html', '');
    const protectedPages = {
        funcionario: ['dashboard', 'horarios', 'monitoramento'],
        supervisor: ['dashboard', 'alertas', 'cadastro', 'funcionarios', 'horarios', 'monitoramento', 'notificacoes', 'relatorio']
    };
    
    if (currentPage !== 'index' && !protectedPages[userType].includes(currentPage)) {
        window.location.href = 'dashboard.html';
    }
}

// Adicione isso no início de cada página protegida (exceto index.html):
// <script>checkAuth();</script>