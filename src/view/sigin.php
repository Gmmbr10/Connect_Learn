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
</head>
<body>

	<header>
		
		<p>logo</p>

		<nav>
			
			<a href="./home">Home</a>
			<a href="./login">Entrar</a>
			<a href="./sigin">Cadastre-se</a>

		</nav>

	</header>

	<main class="container">
		
		<section class="flex-1 flex-center grid-flex">
			
			<form class="box-default">
				
				<h2>Crie uma conta</h2>

				<section class="grid-flex">
					<section class="input-box">
						<label for="#">Nome:</label>
						<input type="text" name="#" id="#">
						<span class="error" id="error_#"></span>
					</section>
					<section class="input-box">
						<label for="#">Sobrenome:</label>
						<input type="text" name="#" id="#">
						<span class="error" id="error_#"></span>
					</section>
				</section>

				<section>
					<section class="grid-flex">
						<section class="input-check">
							<input type="radio" name="#" id="#">
							<label for="#">Estudante</label>
						</section>
						<section class="input-check">
							<input type="radio" name="#" id="#">
							<label for="#">Tutor</label>
						</section>
					</section>
					<span class="error" id="error_#"></span>
				</section>

				<section class="input-box">
					<label for="#">Email:</label>
					<input type="email" name="#" id="#">
					<span class="error" id="error_#"></span>
				</section>

				<section class="input-box">
					<label for="#">Telefone:</label>
					<input type="tel" name="#" id="#">
					<span class="error" id="error_#"></span>
				</section>

				<section class="input-box">
					<label for="#">Senha:</label>
					<input type="password" name="#" id="#">
					<span class="error" id="error_#"></span>
				</section>

				<section class="input-box">
					<label for="#">Confirmar senha:</label>
					<input type="password" name="#" id="#">
					<span class="error" id="error_#"></span>
				</section>

				<section class="input-check">
					<input type="checkbox" name="#" id="#">
					<label for="#">Aceito os termos de uso</label>
				</section>

				<button class="btn w-100">Cadastrar-se</button>

			</form>

			<section class="flex-center">
				
				<p>logo</p>

			</section>

		</section>

	</main>

	<footer>
		
		<p>logo</p>

		<nav>
			
			<a href="#">Link</a>
			<a href="#">Link</a>
			<a href="#">Link</a>

		</nav>

		<nav>

			<a href="#">
				<i class="fa-brands fa-instagram"></i>
			</a>
			<a href="#">
				<i class="fa-solid fa-envelope"></i>
			</a>
			
		</nav>

	</footer>

</body>
</html>