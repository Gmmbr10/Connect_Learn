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

	<header class="container row space-between align-center">
		
		<p>logo</p>

		<nav class="navbar">
			
			<a href="./home">Home</a>
			<a href="./login">Entrar</a>
			<a href="./sigin">Cadastre-se</a>

		</nav>

	</header>

	<main class="container justify-center">
		
		<section class="grid-flex flex-center column-reverse">
			
			<form class="box" method="POST" id="login_form">
				
				<h2>Entrar</h2>

				<span class="error"><?php if ( isset($data["usuario"]) ) { echo $data["usuario"]; } ?></span>

				<section class="input-box">
					<label for="input_email">Email:</label>
					<input class="input" type="email" name="email" id="input_email">
					<span class="error" id="error_input_email"><?php if ( isset($data["email"]) ) { echo $data["email"]; } ?></span>
				</section>

				<section class="input-box">
					<label for="input_senha">Senha:</label>
					<input class="input" type="password" name="senha" id="input_senha">
					<span class="error" id="error_input_senha"><?php if ( isset($data["senha"]) ) { echo $data["senha"]; } ?></span>
				</section>

				<button class="btn w-100">Entrar</button>

			</form>

			<section class="flex-center">
				
				<p>logo</p>

			</section>

		</section>

	</main>

	<?php require_once __DIR__ . "/./template_footer.php"; ?>

	<script src="<?php echo INCLUDE_PATH?>public/script/login_verify.js"></script>

</body>
</html>