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
    <    <main class="main__content">
      <section class="container__list__clients">
        <section class="list_clients">
          <div class="header__list__clients">
            <h1 class="list__clients__title">Clientes</h1>
           <a href="/clientes/cadastro"> <button class="btn btn-primary">Cadastrar</button></a>
          </div>
          <div class="body__list__clients">
            <?php if (!empty($clientes)): ?>
              <?php foreach ($clientes as $cliente): ?>
                  <div class="card__client">
                      <h2 class="card__client__name"><?= htmlspecialchars($cliente['nome']) ?></h2>
                      <h4 class="card__client__email">
                          <strong>Email: </strong><?= htmlspecialchars($cliente['email']) ?>
                      </h4>
                      <h4 class="card__client__telefone">
                          <strong>Telefone: </strong><?= htmlspecialchars($cliente['telefone']) ?>
                      </h4>
                  </div>
              <?php endforeach; ?>
          <?php else: ?>
              <p class="no-clients-message">Nenhum cliente cadastrado...</p>
          <?php endif; ?>
        </div>

        </section>
      </section>
    </main>
  </body>
</html>
