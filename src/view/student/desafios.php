<?php

$navbar = file_get_contents("src/view/student_templates/navbar.html");
$html = file_get_contents("src/view/student_templates/desafios.html");

if (isset($_GET["action"]) && $_GET["action"] == "visualizar") {

  $html = file_get_contents("src/view/student_templates/desafio.html");
}

if (isset($_GET["action"]) && $_GET["action"] == "criar equipe") {

  $html = file_get_contents("src/view/student_templates/criar_equipe.html");
}

if (isset($_GET["action"]) && $_GET["action"] == "juntar equipe") {

  $html = file_get_contents("src/view/student_templates/listar_equipes.html");
}

$navbar = str_replace("{include_path}", INCLUDE_PATH, $navbar);
$html = str_replace("{navbar}", $navbar, $html);
$html = str_replace("{include_path}", INCLUDE_PATH, $html);

echo $html;
