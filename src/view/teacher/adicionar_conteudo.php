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
  <!-- editor de texto -->
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
</head>

<body>

  <?php include_once __DIR__ . "/template_header.php"; ?>

  <main style="width: 100vw">

    <?php include_once __DIR__ . "/template_navbar.php"; ?>

    <section class="container">

      <a href="<?= INCLUDE_PATH ?>teacher/conteudos"><i class="fa-solid fa-arrow-left"></i> Voltar para a página conteúdos</a>

      <h2>Adicionar conteúdo</h2>

      <section class="col-2">
        <form action="#" method="POST" id="form_conteudo" class="column gap">

          <section class="input-box">
            
            <label for="#">Curso:</label>
            <select name="#">

              <option value="#">Conteúdo</option>
              <option value="#">Conteúdo</option>
              <option value="#">Conteúdo</option>
              
            </select>

            <span class="error" id="error_#"></span>

          </section>

          <section class="input-box">
            
            <label for="#">Módulo:</label>
            <select name="#">

              <option value="#">Conteúdo</option>
              <option value="#">Conteúdo</option>
              <option value="#">Conteúdo</option>
              
            </select>

            <span class="error" id="error_#"></span>

          </section>

          <section class="input-box">

            <label for="#">Título do conteúdo:</label>
            <input type="text" name="#" id="input_#" class="input">
            <span class="error" id="error_#"></span>

          </section>

          <section class="input-box">

            <label for="#">Link de um vídeo (opicional):</label>
            <input type="url" name="#" id="input_#" class="input">
            <span class="error" id="error_#"></span>

          </section>

          <section class="input-box">

            <label for="#">Conteúdo:</label>
            <section>
              <section name="#" id="editor" style="height: auto;"></section>
            </section>
            <span class="error" id="error_#"></span>

          </section>

          <button class="btn">Enviar</button>

        </form>
      </section>

    </section>

  </main>

  <?php require_once __DIR__ . "/../template_footer.php"; ?>

  <script src="<?php echo INCLUDE_PATH ?>public/script/navbar.js"></script>
  <!-- editor de texto -->
  <script>
    const quill = new Quill('#editor', {
      theme: 'snow'
    });
  </script>

</body>

</html>