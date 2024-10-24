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
  <!-- editor de texto -->
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
</head>

<body>

  <?php include_once __DIR__ . "/template_header.php"; ?>

  <main style="width: 100vw">

    <?php include_once __DIR__ . "/template_navbar.php"; ?>

    <section class="container">

      <section class="row space-between align-center">

        <h2>Dúvidas</h2>

        <span id="open_duvida" class="btn">Mandar dúvida</span>

      </section>

      <section class="column gap">

        <p class="bold">Suas dúvidas</p>

        <section class="flex-1 column w-100">
          <section class="scroll-x">

            <section class="question">

              <header>

                <i class="fa-solid fa-user user-profile"></i>

                <p>Nome usuário</p>

              </header>

              <main>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam nostrum nihil facere, modi ipsa corrupti earum perspiciatis ea accusamus minima, sapiente et corporis eaque! Iste deserunt cumque iusto nesciunt pariatur.
                </p>

              </main>

            </section>
            <section class="question">

              <header>

                <i class="fa-solid fa-user user-profile"></i>

                <p>Nome usuário</p>

              </header>

              <main>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam nostrum nihil facere, modi ipsa corrupti earum perspiciatis ea accusamus minima, sapiente et corporis eaque! Iste deserunt cumque iusto nesciunt pariatur.
                </p>

              </main>

            </section>
            <section class="question">

              <header>

                <i class="fa-solid fa-user user-profile"></i>

                <p>Nome usuário</p>

              </header>

              <main>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam nostrum nihil facere, modi ipsa corrupti earum perspiciatis ea accusamus minima, sapiente et corporis eaque! Iste deserunt cumque iusto nesciunt pariatur.
                </p>

              </main>

            </section>
            <section class="question">

              <header>

                <i class="fa-solid fa-user user-profile"></i>

                <p>Nome usuário</p>

              </header>

              <main>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam nostrum nihil facere, modi ipsa corrupti earum perspiciatis ea accusamus minima, sapiente et corporis eaque! Iste deserunt cumque iusto nesciunt pariatur.
                </p>

              </main>

            </section>
            <section class="question">

              <header>

                <i class="fa-solid fa-user user-profile"></i>

                <p>Nome usuário</p>

              </header>

              <main>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam nostrum nihil facere, modi ipsa corrupti earum perspiciatis ea accusamus minima, sapiente et corporis eaque! Iste deserunt cumque iusto nesciunt pariatur.
                </p>

              </main>

            </section>
            <section class="question">

              <header>

                <i class="fa-solid fa-user user-profile"></i>

                <p>Nome usuário</p>

              </header>

              <main>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam nostrum nihil facere, modi ipsa corrupti earum perspiciatis ea accusamus minima, sapiente et corporis eaque! Iste deserunt cumque iusto nesciunt pariatur.
                </p>

              </main>

            </section>
            <section class="question">

              <header>

                <i class="fa-solid fa-user user-profile"></i>

                <p>Nome usuário</p>

              </header>

              <main>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam nostrum nihil facere, modi ipsa corrupti earum perspiciatis ea accusamus minima, sapiente et corporis eaque! Iste deserunt cumque iusto nesciunt pariatur.
                </p>

              </main>

            </section>
            <section class="question">

              <header>

                <i class="fa-solid fa-user user-profile"></i>

                <p>Nome usuário</p>

              </header>

              <main>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam nostrum nihil facere, modi ipsa corrupti earum perspiciatis ea accusamus minima, sapiente et corporis eaque! Iste deserunt cumque iusto nesciunt pariatur.
                </p>

              </main>

            </section>
            <section class="question">

              <header>

                <i class="fa-solid fa-user user-profile"></i>

                <p>Nome usuário</p>

              </header>

              <main>

                <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam nostrum nihil facere, modi ipsa corrupti earum perspiciatis ea accusamus minima, sapiente et corporis eaque! Iste deserunt cumque iusto nesciunt pariatur.
                </p>

              </main>

            </section>

          </section>
        </section>

      </section>

      <section class="column gap">

        <p class="bold">Dúvidas de outros estudantes</p>

        <section class="grid">

          <section class="question">

            <header>

              <i class="fa-solid fa-user user-profile"></i>

              <p>Nome usuário</p>

            </header>

            <main>

              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam nostrum nihil facere, modi ipsa corrupti earum perspiciatis ea accusamus minima, sapiente et corporis eaque! Iste deserunt cumque iusto nesciunt pariatur.
              </p>

            </main>

          </section>

        </section>

      </section>

    </section>

  </main>

  <?php require_once __DIR__ . "/../template_footer.php"; ?>

  <form action="#" method="POST" id="duvida_form">

    <dialog id="modal_duvida">
      <header>

        <h2>Registrar uma dúvida</h2>
        <i class="fa-solid fa-close close_duvida"></i>

      </header>
      <main>

        <section class="input-box">

          <label for="#">Escreva sua dúvida:</label>
          <section>
            <section name="#" id="editor" style="height: auto;"></section>
          </section>
          <span class="error" id="error_#"></span>

        </section>

      </main>

      <footer>

        <button type="submit" class="btn">Registrar</button>
        <span class="btn close_duvida text-center">Fechar</span>
      
      </footer>
    </dialog>

  </form>

  <script src="<?php echo INCLUDE_PATH ?>public/script/navbar.js"></script>
  <script src="<?php echo INCLUDE_PATH ?>public/script/duvida_modal.js"></script>
  <script src="<?php echo INCLUDE_PATH ?>public/script/duvida_verify.js"></script>
  <!-- editor de texto -->
  <script>
    const quill = new Quill('#editor', {
      theme: 'snow'
    });
  </script>

</body>

</html>