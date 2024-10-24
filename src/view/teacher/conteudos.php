<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connect Learn - Professor</title>
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

      <h2>Cadastre um conteúdo</h2>

      <section class="flex gap">

        <section class="btn w-100 row gap flex-center" onclick="window.location.href = './conteudos/criar_curso'">
          <i class="fa-solid fa-newspaper"></i>
          <p>Adicionar um curso</p>
        </section>

        <section class="btn w-100 row gap flex-center" onclick="window.location.href = './conteudos/criar_modulo'">
          <i class="fa-solid fa-folder"></i>
          <p>Adicionar um módulo</p>
        </section>

        <section class="btn w-100 row gap flex-center" onclick="window.location.href = './conteudos/criar_aula'">
          <i class="fa-solid fa-file-lines"></i>
          <p>Adicione o conteúdo</p>
        </section>

      </section>

      <h2>Aqui estão os seus conteúdos</h2>

      <section class="grid-flex">
        


      </section>

    </section>

  </main>

  <?php require_once __DIR__ . "/../template_footer.php"; ?>

  <script src="<?php echo INCLUDE_PATH ?>public/script/navbar.js"></script>

</body>

</html>