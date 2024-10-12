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

      <h2>Desafios</h2>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem, magni.
      </p>

      <p class="bold">Novidades</p>

      <section class="scroll-x">

        <a href="<?= INCLUDE_PATH ?>student/desafio?codigo=10" class="challenge">

          <img src="#" alt="">

          <p class="bold">Título</p>

        </a>
        <a href="<?= INCLUDE_PATH ?>student/desafio?codigo=10" class="challenge">

          <img src="#" alt="">

          <p class="bold">Título</p>

        </a>
        <a href="<?= INCLUDE_PATH ?>student/desafio?codigo=10" class="challenge">

          <img src="#" alt="">

          <p class="bold">Título</p>

        </a>

      </section>

      <p class="bold">Os mais populares</p>

      <section class="scroll-x">

        <a href="<?= INCLUDE_PATH ?>student/desafio?codigo=10" class="challenge">

          <img src="#" alt="">

          <p class="bold">Título</p>

        </a>
        <a href="<?= INCLUDE_PATH ?>student/desafio?codigo=10" class="challenge">

          <img src="#" alt="">

          <p class="bold">Título</p>

        </a>
        <a href="<?= INCLUDE_PATH ?>student/desafio?codigo=10" class="challenge">

          <img src="#" alt="">

          <p class="bold">Título</p>

        </a>

      </section>

      <p class="bold">Desafios que você participou</p>

      <section class="scroll-x">

        <a href="<?= INCLUDE_PATH ?>student/desafio?codigo=10" class="challenge">

          <img src="#" alt="">

          <p class="bold">Título</p>

        </a>
        <a href="<?= INCLUDE_PATH ?>student/desafio?codigo=10" class="challenge">

          <img src="#" alt="">

          <p class="bold">Título</p>

        </a>
        <a href="<?= INCLUDE_PATH ?>student/desafio?codigo=10" class="challenge">

          <img src="#" alt="">

          <p class="bold">Título</p>

        </a>

      </section>

    </section>

  </main>

  <?php require_once __DIR__ . "/../template_footer.php"; ?>

  <script src="<?php echo INCLUDE_PATH ?>public/script/navbar.js"></script>

</body>

</html>