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

      <h2>Conteúdos</h2>

      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe, corporis.
      </p>

      <p class="bold">Núcleos</p>

      <section class="grid">

        <section class="btn w-100 row gap flex-center">
          <i class="fa-solid fa-calculator"></i>
          <p>Exatas</p>
        </section>

        <section class="btn w-100 row gap flex-center">
          <i class="fa-solid fa-book"></i>
          <p>Humanas</p>
        </section>

        <section class="btn w-100 row gap flex-center">
          <i class="fa-solid fa-microscope"></i>
          <p>Biológicas</p>
        </section>

      </section>

      <p class="bold">Dicas de estudo</p>

      <section class="grid">

        <iframe class="video" src="https://www.youtube.com/embed/Y5gCFOzV6so?si=0ehCqcOeZxWIr3Ap" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe class="video" src="https://www.youtube.com/embed/Y5gCFOzV6so?si=0ehCqcOeZxWIr3Ap" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <iframe class="video" src="https://www.youtube.com/embed/Y5gCFOzV6so?si=0ehCqcOeZxWIr3Ap" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

      </section>

    </section>

  </main>

  <?php require_once __DIR__ . "/../template_footer.php"; ?>

  <script src="<?php echo INCLUDE_PATH ?>public/script/navbar.js"></script>

</body>

</html>