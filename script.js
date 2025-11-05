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