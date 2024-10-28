<?php

$navbar = file_get_contents("src/view/student_templates/navbar.html");
$html = file_get_contents("src/view/student_templates/conteudos.html");

if (isset($_GET["action"]) && $_GET["action"] == "lista") {

  $html = file_get_contents("src/view/student_templates/lista_conteudos.html");

  $html = str_replace("{nucleo}", ucfirst(strtolower($_GET["nucleo"])), $html);
}

$navbar = str_replace("{include_path}", INCLUDE_PATH, $navbar);
$html = str_replace("{navbar}", $navbar, $html);
$html = str_replace("{include_path}", INCLUDE_PATH, $html);

echo $html;
