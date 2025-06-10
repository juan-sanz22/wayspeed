<script>
document.addEventListener('DOMContentLoaded', function() {
    // Anima as barras de progresso
    const progressFills = document.querySelectorAll('.progress-fill');
    progressFills.forEach(fill => {
        const width = fill.getAttribute('data-width');
        setTimeout(() => {
            fill.style.width = width;
        }, 100);
    });

    // Adiciona interação aos cards de estatísticas
    const statBoxes = document.querySelectorAll('.stat-box');
    statBoxes.forEach(box => {
        box.addEventListener('click', function() {
            // Efeito visual ao clicar
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 200);
            
            // Aqui você pode adicionar lógica para mostrar mais detalhes
            console.log('Clicou em: ', this.querySelector('.stat-label').textContent);
        });
    });

    // Simula atualização de dados a cada 5 segundos
    setInterval(() => {
        updateRandomStats();
    }, 5000);
});

function updateRandomStats() {
    const statNumbers = document.querySelectorAll('.stat-number');
    statNumbers.forEach(numberElement => {
        // Não atualiza os números que são porcentagens
        if (!numberElement.textContent.includes('%')) {
            const currentValue = parseInt(numberElement.textContent);
            const change = Math.floor(Math.random() * 5) - 2; // -2 a +2
            const newValue = Math.max(0, currentValue + change);
            
            // Efeito de contagem
            animateValue(numberElement, currentValue, newValue, 500);
        }
    });
}

function animateValue(element, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        element.textContent = Math.floor(progress * (end - start) + start);
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}
</script>