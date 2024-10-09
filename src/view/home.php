<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connect Learn</title>
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>public/fontawesome/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>public/fontawesome/css/brands.css">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>public/fontawesome/css/solid.css">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>public/style/app.css">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>public/style/home/style.css">
</head>

<body>

	<header class="container row space-between">
		<p>logo</p>
		<nav class="navbar">
			<a href="./home">Home</a>
			<a href="./login">Entrar</a>
			<a href="./sigin">Cadastre-se</a>
		</nav>
	</header>

	<main>

		<section class="flex flex-1 bg-image-1">

			<section class="container flex-1 flex-center bg-opacity-1">

				<h2>Venha aprender conosco!</h2>

			</section>

		</section>

		<section class="container text-center">

			<h2>Conecte-se da melhor forma</h2>

			<section class="grid-flex">

				<section class="card">
					<i class="fa-solid fa-globe-americas"></i>
					<p>Lorem ipsum dolor sit amet.</p>
				</section>
				<section class="card">
					<i class="fa-solid fa-puzzle-piece"></i>
					<p>Lorem ipsum dolor sit amet.</p>
				</section>
				<section class="card">
					<i class="fa-solid fa-people-group"></i>
					<p>Lorem ipsum dolor sit amet.</p>
				</section>

			</section>

		</section>

		<section class="container align-center text-center">

			<h2 class="text-primary">Você aprende em casa</h2>

			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse, ipsa.
			</p>

			<a href="./sigin" class="btn inline">Cadastre-se</a>

		</section>

		<section class="bg-image-2">

			<section class="container bg-opacity-2">

				<h2 class="text-center">Planos</h2>

				<section class="grid-flex">

					<section class="card-long column align-center">

						<section class="column text-primary bold">
							<p>00</p>
							<p>Meses de acesso</p>
						</section>

						<ul class="column gap">
							<li>
								<i class="fa-solid fa-check"></i>
								Vantagem
							</li>
							<li>
								<i class="fa-solid fa-check"></i>
								Vantagem
							</li>
							<li>
								<i class="fa-solid fa-check"></i>
								Vantagem
							</li>
						</ul>

					</section>

					<section class="card-long column align-center">

						<section class="column text-primary bold">
							<p>00</p>
							<p>Meses de acesso</p>
						</section>

						<ul class="column gap">
							<li>
								<i class="fa-solid fa-check"></i>
								Vantagem
							</li>
							<li>
								<i class="fa-solid fa-check"></i>
								Vantagem
							</li>
							<li>
								<i class="fa-solid fa-check"></i>
								Vantagem
							</li>
						</ul>

					</section>

					<section class="card-long column align-center">

						<section class="column text-primary bold">
							<p>00</p>
							<p>Meses de acesso</p>
						</section>

						<ul class="column gap">
							<li>
								<i class="fa-solid fa-check"></i>
								Vantagem
							</li>
							<li>
								<i class="fa-solid fa-check"></i>
								Vantagem
							</li>
							<li>
								<i class="fa-solid fa-check"></i>
								Vantagem
							</li>
						</ul>

					</section>

				</section>

			</section>

		</section>
		
		<section class="container flex-center">

			<h2>Perguntas frequentes</h2>

			<section class="rounded border">

				<details>

					<summary>
						Pergunta
						<i class="fa-solid fa-caret-down"></i>
					</summary>

					<section>

						<p>resposta</p>

					</section>

				</details>
				<details>

					<summary>
						Pergunta
						<i class="fa-solid fa-caret-down"></i>
					</summary>

					<section>

						<p>resposta</p>

					</section>

				</details>
				<details>

					<summary>
						Pergunta
						<i class="fa-solid fa-caret-down"></i>
					</summary>

					<section>

						<p>resposta</p>

					</section>

				</details>

			</section>

		</section>

	</main>

	<?php require_once __DIR__ . "/./template_footer.php"; ?>

</body>

</html>