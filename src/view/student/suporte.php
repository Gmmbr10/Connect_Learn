<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connect Learn - Estudante</title>
  <link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>public/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>public/fontawesome/css/solid.css">
  <link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>public/fontawesome/css/brands.css">
  <link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>public/style/app.css">
  <link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>public/style/student/layout.css">
</head>

<body>

  <?php include_once __DIR__ . "/template_header.php"; ?>

  <main style="width: 100vw">

    <?php include_once __DIR__ . "/template_navbar.php"; ?>

    <section class="container">

      <section class="grid-flex">

        <section class="column gap">
          <h2>Suporte</h2>

          <p>
            Precisa de ajuda? Mande um email para nós!
          </p>

          <form action="#" method="POST" id="form_suporte" class="column gap">

            <section class="input-box">

              <label for="email">Insira seu email:</label>

              <input type="email" name="email" id="input_email" class="input">

              <span class="error" id="error_email"></span>

            </section>

            <section class="input-box">

              <label for="assunto">Insira o assunto:</label>

              <textarea name="assunto" id="input_assunto" class="input"></textarea>

              <span class="error" id="error_assunto"></span>

            </section>

            <button type="submit" class="btn">Enviar</button>

          </form>
        </section>
        <section class="column gap">
          <h2>Problemas recentes</h2>

          <section class="box">
            <p class="bold">Pergunta</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium eius assumenda deserunt. Quisquam modi dolor labore molestias rerum ad recusandae.</p>
          </section>
        </section>

      </section>

    </section>

  </main>

  <dialog id="modal_suporte">

    <header>

      <p>Enviado com sucesso!</p>

      <i class="fa-solid fa-close" onclick="window.location.href = '<?=INCLUDE_PATH?>student/suporte'"></i>
    
    </header>

    <main class="flex flex-center">

      <p>Agradecemos o contato, em breve retornamos com uma resposta!</p>
      
    </main>

    <footer>

    <span class="btn" onclick="window.location.href = '<?=INCLUDE_PATH?>student/suporte'">Fechar</span>
      
    </footer>
    
  </dialog>

  <?php require_once __DIR__ . "/../template_footer.php"; ?>

  <script src="<?php echo INCLUDE_PATH ?>public/script/navbar.js"></script>
  <script src="<?php echo INCLUDE_PATH ?>public/script/suporte_verify.js"></script>

</body>

</html>