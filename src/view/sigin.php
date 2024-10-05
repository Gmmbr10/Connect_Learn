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
			
			<form class="box-default" method="POST" id="sigin_form">
				
				<h2>Crie uma conta</h2>

				<section class="grid-flex">
					<section class="input-box">
						<label for="input_nome">Nome:</label>
						<input type="text" name="nome" id="input_nome">
						<span class="error" id="error_nome"></span>
					</section>
					<section class="input-box">
						<label for="input_sobrenome">Sobrenome:</label>
						<input type="text" name="sobrenome" id="input_sobrenome">
						<span class="error" id="error_sobrenome"></span>
					</section>
				</section>

				<section>
					<section class="grid-flex">
						<section class="input-check">
							<input type="radio" name="tipo_usuario" id="input_tipo_usuario_e" value="estudante">
							<label for="input_tipo_usuario_e">Estudante</label>
						</section>
						<section class="input-check">
							<input type="radio" name="tipo_usuario" id="input_tipo_usuario_p" value="professor">
							<label for="input_tipo_usuario_p">Professor</label>
						</section>
					</section>
					<span class="error" id="error_tipo_usuario"></span>
				</section>

				<section class="input-box">
					<label for="input_email">Email:</label>
					<input type="email" name="email" id="input_email">
					<span class="error" id="error_email"></span>
				</section>

				<section class="input-box">
					<label for="input_telefone">Telefone:</label>
					<input type="tel" name="telefone" id="input_telefone">
					<span class="error" id="error_telefone"></span>
				</section>

				<section class="input-box">
					<label for="input_senha">Senha:</label>
					<input type="password" name="senha" id="input_senha">
					<span class="error" id="error_senha"></span>
				</section>

				<section class="input-box">
					<label for="input_confirmar_senha">Confirmar senha:</label>
					<input type="password" name="confirmar_senha" id="input_confirmar_senha">
					<span class="error" id="error_confirmar_senha"></span>
				</section>

				<section>
					<section class="input-check">
						<input type="checkbox" name="termos_uso" id="input_termos_uso">
						<label for="input_termos_uso">Li e aceito os <span class="link" id="open_termos_uso">termos de uso</span></label>
					</section>
					<span class="error" id="error_termos_uso"></span>
				</section>

				<button class="btn w-100">Cadastrar-se</button>

			</form>

			<section class="flex-center">
				
				<p>logo</p>

			</section>

		</section>

	</main>

	<?php require_once __DIR__ . "/./template_footer.php"; ?>

	<dialog id="modal_termos_uso">
        
        <header>
            
            <p>Termos de uso</p>

           	<i class="fa-solid fa-close close_termos_uso"></i>

        </header>

        <main>
            
            <p>
            	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>

        </main>

        <footer>
            
        	<span class="btn close_termos_uso">
        		Fechar
        	</span>

        </footer>

    </dialog>

	<script src="<?php echo INCLUDE_PATH ?>public/script/sigin_verify.js"></script>
	<script src="<?php echo INCLUDE_PATH ?>public/script/sigin_modal.js"></script>

</body>
</html>