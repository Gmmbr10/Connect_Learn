<?php

$navbar = file_get_contents("src/view/student_templates/navbar.html");
$html = file_get_contents("src/view/student_templates/desafios.html");

if (isset($_GET["action"]) && $_GET["action"] == "visualizar") {

  $html = file_get_contents("src/view/student_templates/desafio.html");
  $html = str_replace("{link_img}", $data["desafio"]["arq_caminho"], $html);
  $html = str_replace("{discord}", $data["desafio"]["des_url"], $html);
  $html = str_replace("{criador}", $data["desafio"]["usu_nome"], $html);
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
$html = str_replace("{header}", $header, $html);

if ($_SESSION["usuario"]["usu_id_foto"] != null) {

  $html = str_replace("{img_perfil}", '<img src="' . $_SESSION["usuario"]["arq_caminho"] . '"/>', $html);
  $html = str_replace("{style_perfil}", "profile", $html);
} else {

  $html = str_replace("{img_perfil}", '<i class="fa-solid fa-user"></i>', $html);
  $html = str_replace("{style_perfil}", "bg-secondary profile", $html);
}

$html = str_replace("{navbar}", $navbar, $html);
$html = str_replace("{logo_header}","{include_path}public/default/images/logo.png",$html);
$html = str_replace("{include_path}", INCLUDE_PATH, $html);

echo $html;
