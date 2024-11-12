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
  $html = str_replace("{id}", $data["desafios"]["des_id"], $html);
  $html = str_replace("{titulo}", $data["desafios"]["des_titulo"], $html);
  $html = str_replace("{pergunta}", $data["desafios"]["des_descricao"], $html);

  $html = str_replace("{equipes}", $data["desafio"], $html);

  $header = file_get_contents("src/view/student_templates/header.html");
  $html = str_replace("{header}", $header, $html);
  $html = str_replace("{navbar}", $navbar, $html);
  $html = str_replace("{include_path}", INCLUDE_PATH, $html);

  echo $html;
  die();
}

if (isset($data["desafios"])) {

  $html = str_replace("{desafios}", $data["desafios"], $html);
}

if (isset($_GET["desafio"])) {

  if (empty($_GET["desafio"])) {

    echo "<script>window.location = '" . INCLUDE_PATH . "student/desafios'</script>";
  }

  $html = str_replace("{id}", $data["desafio"]["des_id"], $html);
  $html = str_replace("{titulo}", $data["desafio"]["des_titulo"], $html);
  $html = str_replace("{pergunta}", $data["desafio"]["des_descricao"], $html);
}

$header = file_get_contents("src/view/student_templates/header.html");
$html = str_replace("{header}",$header,$html);
$html = str_replace("{navbar}",$navbar,$html);
$html = str_replace("{include_path}",INCLUDE_PATH,$html);

echo $html;
