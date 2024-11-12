<?php

$navbar = file_get_contents("src/view/teacher_templates/navbar.html");
$html = file_get_contents("src/view/teacher_templates/desafios.html");

if (isset($_GET["action"]) && $_GET["action"] == "visualizar") {

  $html = file_get_contents("src/view/teacher_templates/desafio.html");
  $html = str_replace("{id_desafio}", $data["desafio"]["des_id"], $html);
  $html = str_replace("{id_foto}", $data["desafio"]["arq_id"], $html);
  $html = str_replace("{titulo}", $data["desafio"]["des_titulo"], $html);
  $html = str_replace("{pergunta}", $data["desafio"]["des_descricao"], $html);
  $html = str_replace("{link_img}", $data["desafio"]["arq_caminho"], $html);
  $html = str_replace("{discord}", $data["desafio"]["des_url"], $html);
  $html = str_replace("{criador}", $data["desafio"]["usu_nome"], $html);
}

if (isset($data["desafios"])) {

  $html = str_replace("{desafios}", $data["desafios"], $html);
}

$resultado = "";
if (isset($_GET["action"]) && $_GET["action"] == "criar") {

  $html = file_get_contents("src/view/teacher_templates/criar_desafio.html");

  if (!empty($data) && empty($data["desafios"]) && isset($_POST["desafio"])) {

    if ($data == true) {

      $resultado = "<p class=\"alert\">Desafio inserido com sucesso!</p>";
    } else {

      $resultado = "<p class=\"alert\">Houve algum erro durante o processo :(</p>";
    }
  }
}

if (!empty($data["desafios"])) {

  $html = str_replace("{desafios}", $data["desafios"], $html);
} else {
  
  $html = str_replace("{desafios}", "<p>Nenhum desafio encontrado</p>", $html);
}

if (isset($_GET["action"]) and $_GET["action"] == "ver desafio") {

  $html = file_get_contents("src/view/teacher_templates/ver_desafio.html");
  
}

$html = str_replace("{resultado}", $resultado, $html);

$header = file_get_contents("src/view/teacher_templates/header.html");
$html = str_replace("{header}",$header,$html);

if ( $_SESSION["usuario"]["usu_id_foto"] != null ) {

  $html = str_replace("{img_perfil}",'<img src="'.$_SESSION["usuario"]["arq_caminho"].'"/>',$html);
  $html = str_replace("{style_perfil}","profile",$html);
} else {
  
  $html = str_replace("{img_perfil}",'<i class="fa-solid fa-user"></i>',$html);
  $html = str_replace("{style_perfil}","bg-secondary profile",$html);
}

$html = str_replace("{logo_header}","{include_path}public/default/images/logo.png",$html);
$html = str_replace("{navbar}",$navbar,$html);
$html = str_replace("{include_path}",INCLUDE_PATH,$html);

echo $html;
