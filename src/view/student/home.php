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

	<header>

		<section class="flex flex-row align-items-center">
			<i class="fa-solid fa-bars" id="btn_navbar"></i>
			<p>logo</p>
		</section>

		<nav>

			<a href="#">Link</a>
			<a href="#">Link</a>
			<a href="#">Link</a>
			
		</nav>
		
	</header>

	<main>

		<nav class="navbar" id="navbar">

			<a href="#">Link</a>
			<a href="#">Link</a>
			<a href="#">Link</a>
			
		</nav>
		
		<section class="container">

			<h1>Home student</h1>
			
		</section>

	</main>

	<?php require_once __DIR__ . "/../template_footer.php"; ?>

	<script src="<?php echo INCLUDE_PATH?>public/script/navbar.js"></script>

</body>
</html>