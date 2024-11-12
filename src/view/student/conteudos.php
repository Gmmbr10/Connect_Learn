<?php

$navbar = file_get_contents("src/view/student_templates/navbar.html");
$html = file_get_contents("src/view/student_templates/conteudos.html");

if (isset($_GET["action"]) && $_GET["action"] == "lista") {

  $html = file_get_contents("src/view/student_templates/lista_conteudos.html");

  if ($_GET["nucleo"] == 1) {

    $html = str_replace("{nucleo}", "Biológicas", $html);
  } else if ($_GET["nucleo"] == 2) {
    $html = str_replace("{nucleo}", "Exatas", $html);
  } else if ($_GET["nucleo"] == 3) {
    $html = str_replace("{nucleo}", "Humanas", $html);
  }

  $html = str_replace("{cursos}", $data, $html);
}

$header = file_get_contents("src/view/student_templates/header.html");
$html = str_replace("{header}",$header,$html);
$html = str_replace("{navbar}",$navbar,$html);
$html = str_replace("{include_path}",INCLUDE_PATH,$html);

echo $html;
