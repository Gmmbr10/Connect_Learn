<?php

$navbar = file_get_contents("src/view/teacher_templates/navbar.html");
$html = file_get_contents("src/view/teacher_templates/desafios.html");

$resultado = "";
if (isset($_GET["action"]) && $_GET["action"] == "criar") {

  $html = file_get_contents("src/view/teacher_templates/criar_desafio.html");

  if (!empty($data) and empty($data["desafios"])) {

    if ($data == true) {

      $resultado = "<p class=\"alert\">Desafio inserido com sucesso!</p>";
    } else {

      $resultado = "<p class=\"alert\">Houve algum erro durante o processo :(</p>";
    }
  }
}

if (!empty($data["desafios"])) {

  $html = str_replace("{desafios}", $data["desafios"], $html);
}

if (isset($_GET["action"]) and $_GET["action"] == "ver desafio") {

  $html = file_get_contents("src/view/teacher_templates/ver_desafio.html");
  
}

$html = str_replace("{resultado}", $resultado, $html);

$navbar = str_replace("{include_path}", INCLUDE_PATH, $navbar);
$html = str_replace("{navbar}", $navbar, $html);
$html = str_replace("{include_path}", INCLUDE_PATH, $html);

echo $html;
