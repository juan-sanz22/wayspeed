document.addEventListener('DOMContentLoaded', () => {
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

  [email, confirmEmail, senha, confirmSenha].forEach(el => {
    el.addEventListener('input', () => clearError(el));
  });

  form.addEventListener('submit', e => {
    let valido = true;
    document.querySelectorAll('.error-msg').forEach(err => err.remove());

    if (email.value.trim() !== confirmEmail.value.trim()) {
      showError(confirmEmail, 'Os e-mails não coincidem.');
      valido = false;
    }

    if (senha.value !== confirmSenha.value) {
      showError(confirmSenha, 'As senhas não coincidem.');
      valido = false;
    }

    if (senha.value && senha.value === email.value) {
      showError(senha, 'A senha não pode ser igual ao e-mail.');
      valido = false;
    }

    if (!valido) e.preventDefault();
  });
});

document.addEventListener("DOMContentLoaded", () => {
    const cepInput = document.getElementById("confirm-cep");
    if (cepInput) {
        cepInput.addEventListener("blur", function () {
            let cep = this.value.replace(/\D/g, '');

            if (cep.length !== 8) {
                alert("CEP inválido! Digite 8 números.");
                return;
            }

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        alert("CEP não encontrado!");
                        return;
                    }

                    document.getElementById("logradouro").value = data.logradouro;
                    document.getElementById("bairro").value = data.bairro;
                    document.getElementById("localidade").value = data.localidade + " / " + data.uf;
                })
                .catch(() => {
                    alert("Erro ao consultar CEP!");
                });
        });
    }
    
    const searchInput = document.querySelector(".search-box input");
    const cards = document.querySelectorAll(".funcionario-card");

    if (searchInput && cards.length > 0) {
        searchInput.addEventListener("input", () => {
            const value = searchInput.value.toLowerCase();

            cards.forEach(card => {
                const text = card.innerText.toLowerCase();
                card.style.display = text.includes(value) ? "block" : "none";
            });
        });
    }
});