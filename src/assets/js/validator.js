document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".register__client__form");

  const nameInput = document.querySelector('input[name="nome"]');
  const phoneInput = document.querySelector('input[name="telefone"]');
  const emailInput = document.querySelector('input[name="email"]');

  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const name = nameInput.value.trim();
    const phone = phoneInput.value.trim();
    const email = emailInput.value.trim();

    const nameRegex = /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const phoneRegex = /^\d{10,11}$/;

    if (!name) {
      alert("O nome é obrigatório.");
      nameInput.focus();
      return;
    }
    if (!nameRegex.test(name)) {
      alert("Nome inválido. Use apenas letras e espaços.");
      nameInput.focus();
      return;
    }

    if (!email) {
      alert("O e-mail é obrigatório.");
      emailInput.focus();
      return;
    }
    if (!emailRegex.test(email)) {
      alert("E-mail inválido.");
      emailInput.focus();
      return;
    }

    if (!phone) {
      alert("O telefone é obrigatório.");
      phoneInput.focus();
      return;
    }
    if (!phoneRegex.test(phone)) {
      alert("Telefone inválido. Digite 10 ou 11 números.");
      phoneInput.focus();
      return;
    }

    form.submit();
  });
});
