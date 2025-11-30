document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector('.cadastro-form');
    const email = document.getElementById('email');
    const confirmEmail = document.getElementById('confirm-email');
    const senha = document.getElementById('senha');
    const confirmSenha = document.getElementById('confirm-senha');

    function showError(input, msg) {
        let error = input.parentElement.querySelector('.error-msg');
        if (!error) {
            error = document.createElement('small');
            error.classList.add('error-msg');
            error.style.color = 'red';
            error.style.display = 'block';
            error.style.marginTop = '4px';
            input.parentElement.appendChild(error);
        }
        error.textContent = msg;
    }

    function clearError(input) {
        const error = input.parentElement.querySelector('.error-msg');
        if (error) error.remove();
    }

    if (form) {
        [email, confirmEmail, senha, confirmSenha].forEach(el => {
            if (el) el.addEventListener('input', () => clearError(el));
        });

        form.addEventListener('submit', e => {
            let valido = true;
            document.querySelectorAll('.error-msg').forEach(err => err.remove());

            if (email && confirmEmail && email.value.trim() !== confirmEmail.value.trim()) {
                showError(confirmEmail, 'Os e-mails não coincidem.');
                valido = false;
            }

            if (senha && confirmSenha && senha.value !== confirmSenha.value) {
                showError(confirmSenha, 'As senhas não coincidem.');
                valido = false;
            }

            if (senha && email && senha.value === email.value) {
                showError(senha, 'A senha não pode ser igual ao e-mail.');
                valido = false;
            }

            if (!valido) e.preventDefault();
        });
    }

    const cepInput = document.getElementById("confirm-cep");
    if (cepInput) {
        cepInput.addEventListener("blur", function () {
            let cep = this.value.replace(/\D/g, '');

            if (cep.length !== 8) {
                alert("CEP inválido! Digite 8 números.");
                return;
            }

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(res => res.json())
                .then(data => {
                    if (data.erro) {
                        alert("CEP não encontrado!");
                        return;
                    }

                    document.getElementById("logradouro").value = data.logradouro;
                    document.getElementById("bairro").value = data.bairro;
                    document.getElementById("localidade").value = data.localidade + " / " + data.uf;
                })
                .catch(() => alert("Erro ao consultar CEP!"));
        });
    }


    if (menuBtn && sidebar) {
        menuBtn.addEventListener('click', () => {
            sidebar.classList.add('active');
        });
    }

    if (closeBtn && sidebar) {
        closeBtn.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });
    }
});