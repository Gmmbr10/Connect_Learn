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

      <span>
        <a href="<?= INCLUDE_PATH ?>student/desafios"><i class="fa-solid fa-arrow-left"></i> Voltar para a página desafios</a> /
        <a href="<?= INCLUDE_PATH ?>student/desafio?codigo=10">Página do desafio</a>
      </span>

      <h2>Desafio - Título do desafio</h2>

      <section class="col-2">
        <section class="column gap">
          <p class="bold">Criar equipe</p>

          <form action="#" method="POST" id="form_criar_equipe" class="column gap">

            <section class="input-box">

              <label for="equipe">Nome da equipe:</label>

              <input type="text" name="equipe" id="input_equipe" class="input">

              <span id="error_equipe" class="error"></span>

            </section>

            <section class="input-box">

              <section class="grid-flex">

                <section class="input-box-checkbox">
                  <input class="checkbox" type="radio" name="visibilidade" id="input_visibilidade_pub" value="publico" onclick="desabilitarSenha()">
                  <label for="input_visibilidade_pub">Público</label>
                </section>

                <section class="input-box-checkbox">
                  <input class="checkbox" type="radio" name="visibilidade" id="input_visibilidade_pri" value="privado" onclick="habilitarSenha()">
                  <label for="input_visibilidade_pri">Privado</label>
                </section>

              </section>

              <span class="error" id="error_visibilidade"></span>

            </section>

            <section class="input-box hidden" id="senha_box">

              <label for="senha">Senha:</label>

              <input type="password" name="senha" id="input_senha" class="input">

              <span id="error_senha" class="error"></span>
              
            </section>

            <button type="submit" class="btn">Criar equipe</button>

          </form>
        </section>
      </section>

    </section>

  </main>

  <?php require_once __DIR__ . "/../template_footer.php"; ?>

  <script src="<?php echo INCLUDE_PATH ?>public/script/navbar.js"></script>
  <script src="<?php echo INCLUDE_PATH ?>public/script/criar_equipe_verify.js"></script>

  <script>

    const senha_box = document.getElementById("senha_box");

    function habilitarSenha(){

      senha_box.classList.remove("hidden");
      
    }

    function desabilitarSenha(){

      senha_box.classList.add("hidden");
      
    }
    
  </script>

</body>

</html>