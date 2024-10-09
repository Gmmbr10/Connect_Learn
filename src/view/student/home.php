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

	<main>

		<?php include_once __DIR__ . "/template_navbar.php"; ?>

		<section class="container bg-primary row">

			<section class="box" style="flex: 1;">
				<p>imagem</p>
			</section>

			<section class="column gap" style="flex: 3">

				<h2>Title</h2>

				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia minima modi, blanditiis repudiandae tenetur aut qui nostrum voluptates dolorum delectus. Libero reiciendis asperiores eos aperiam iure reprehenderit tempora qui vel!</p>

			</section>

		</section>

		<section class="container">

			<h2>Atividade recentes</h2>

			<section class="grid-flex">

				<section class="box">
					<a>Conteúdo acessado</a>
					<a>Conteúdo acessado</a>
					<a>Conteúdo acessado</a>
				</section>
				<section class="box">
					<a>Conteúdo acessado</a>
					<a>Conteúdo acessado</a>
					<a>Conteúdo acessado</a>
				</section>
				<section class="box">
					<a>Conteúdo acessado</a>
					<a>Conteúdo acessado</a>
					<a>Conteúdo acessado</a>
				</section>

			</section>

		</section>

		<section class="container bg-primary grid-flex">

			<div class="box">
				<p>conteúdo</p>
			</div>

			<section class="column gap text-center align-center">

				<h2>titulo</h2>

				<p>
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore dolorum vitae assumenda ad consequatur aliquid iste, iusto explicabo accusamus incidunt ducimus deserunt est nihil laborum laboriosam repudiandae doloremque sit voluptatum!
				</p>

				<a href="#" class="btn">Botão</a>

			</section>

		</section>

	</main>

	<?php require_once __DIR__ . "/../template_footer.php"; ?>

</body>

</html>