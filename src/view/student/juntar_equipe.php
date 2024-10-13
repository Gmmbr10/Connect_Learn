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

      <p class="bold">Junte-se a uma equipe</p>

      <section class="grid">

        <div class="box">
          <p class="bold">Nome da equipe</p>
        </div>
        <div class="box">
          <p class="bold">Nome da equipe</p>
        </div>
        <div class="box">
          <p class="bold">Nome da equipe</p>
        </div>
        <div class="box">
          <p class="bold">Nome da equipe</p>
        </div>
        <div class="box">
          <p class="bold">Nome da equipe</p>
        </div>
        <div class="box">
          <p class="bold">Nome da equipe</p>
        </div>
        <div class="box">
          <p class="bold">Nome da equipe</p>
        </div>
      
      </section>
      
    </section>

  </main>

  <?php require_once __DIR__ . "/../template_footer.php"; ?>

  <script src="<?php echo INCLUDE_PATH ?>public/script/navbar.js"></script>

</body>

</html>