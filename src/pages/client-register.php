<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link
      rel="stylesheet"
      href="/src/assets/css/style.css
    "
    />
    <link
      rel="shortcut icon"
      href="/src/assets/img/logo.jpeg"
      type="image/x-icon"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="/src/assets/js/validator.js"></script>
    <title>PROMAD</title>
  </head>
  <body>
    <header class="main__header">
      <nav class="main__header__nav">
        <div class="container__logo__promad">
          <img class="logo__promad" src="/src/assets/img/logo.jpeg" alt="" />
        </div>
        <div class="container__menu__hamburguer">
          <img class="menu__hamburguer" src="/src/assets/img/menu.png" alt="" />
        </div>
      </nav>
    </header>
    <main class="main__content__register">
        <section class="container__register__client__form">
            <div class="header__container__form">
             <div class="header__descripton__options">
                <h3 class="container__form__subtitle">Forneça os dados abaixo</h3>
                <a class="client__link" href=" /clientes">Consultar clientes</a>
             </div>
             <h1 class="container__form__title">Cadastrar cliente</h1>
            </div>
            <form action="/clientes/cadastro" method="POST" class="register__client__form">
            <div class="container__input">
                <img src="/src/assets/img/User.svg" class="icon__user" alt="">
            <input name="nome" autocomplete="off" type="text" class="form__client__input" placeholder="Nome e último nome">
            </div>
            <div class="container__input">
                <img src="/src/assets/img/Smartphone.svg" class="icon__user" alt="">
                <input name="telefone" type="text" class="form__client__input" placeholder="Telefone">
            </div>
            <div class="container__input">
                <img src="/src/assets/img/User.svg" class="icon__user" alt="">
                <input name="email" type="text" class="form__client__input" placeholder="Email">
            </div>
                <button class="btn-submit">Cadastrar</button>
            </form>
        </section>
    </main>
  </body>
</html>
