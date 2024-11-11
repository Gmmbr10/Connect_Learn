<?php

$navbar = file_get_contents("src/view/teacher_templates/navbar.html");
$html = file_get_contents("src/view/teacher_templates/conteudos.html");

if (isset($_GET["action"]) && $_GET["action"] == "criar conteudo") {

  $html = file_get_contents("src/view/teacher_templates/criar_conteudo.html");

}

$navbar = str_replace("{include_path}", INCLUDE_PATH, $navbar);
$html = str_replace("{navbar}", $navbar, $html);
$html = str_replace("{cursos}", $data, $html);
$html = str_replace("{include_path}", INCLUDE_PATH, $html);

echo $html;
