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

      <a href="<?= INCLUDE_PATH ?>student/desafios"><i class="fa-solid fa-arrow-left"></i> Voltar para a página desafios</a>

      <h2>Desafio - Título do desafio</h2>

      <section class="grid-flex">

        <img src="#" alt="">

        <section>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis est numquam facilis quidem pariatur maxime neque modi. Veniam possimus autem dolores eveniet voluptatum reiciendis consectetur itaque modi hic? Ex, voluptates.
          </p>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis est numquam facilis quidem pariatur maxime neque modi. Veniam possimus autem dolores eveniet voluptatum reiciendis consectetur itaque modi hic? Ex, voluptates.
          </p>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis est numquam facilis quidem pariatur maxime neque modi. Veniam possimus autem dolores eveniet voluptatum reiciendis consectetur itaque modi hic? Ex, voluptates.
          </p>
        </section>

      </section>

      <section class="grid-flex">

        <a href="<?= INCLUDE_PATH ?>student/equipe/criar?desafio=10" class="btn">Criar equipe</a>
        <a href="<?= INCLUDE_PATH ?>student/equipe/juntar?desafio=10" class="btn">Junte-se a uma equipe</a>
      
      </section>

    </section>

  </main>

  <?php require_once __DIR__ . "/../template_footer.php"; ?>

  <script src="<?php echo INCLUDE_PATH ?>public/script/navbar.js"></script>

</body>

</html>