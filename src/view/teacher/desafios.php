<?php

$navbar = file_get_contents("src/view/teacher_templates/navbar.html");
$html = file_get_contents("src/view/teacher_templates/desafios.html");

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

$html = str_replace("{navbar}",$navbar,$html);
$html = str_replace("{include_path}",INCLUDE_PATH,$html);

echo $html;
