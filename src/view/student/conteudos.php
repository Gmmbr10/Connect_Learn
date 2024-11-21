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

if ( isset($_GET["action"]) && $_GET["action"] == "visualizar" ) {

  $html = file_get_contents("src/view/student_templates/curso.html");

  if ($data["curso"]["cur_tema"] == 1) {

    $html = str_replace("{nucleo}", "Biológicas", $html);
  } else if ($data["curso"]["cur_tema"] == 2) {
    $html = str_replace("{nucleo}", "Exatas", $html);
  } else if ($data["curso"]["cur_tema"] == 3) {
    $html = str_replace("{nucleo}", "Humanas", $html);
  }
  
  $html = str_replace("{tema}",$data["curso"]["cur_tema"],$html);
  $html = str_replace("{titulo}",$data["curso"]["cur_nome"],$html);
  $html = str_replace("{modulo}",$data["modulo"],$html);

}

$header = file_get_contents("src/view/student_templates/header.html");
$html = str_replace("{header}",$header,$html);

if ( $_SESSION["usuario"]["usu_id_foto"] != null ) {

  $html = str_replace("{img_perfil}",'<img src="'.$_SESSION["usuario"]["arq_caminho"].'"/>',$html);
  $html = str_replace("{style_perfil}","profile",$html);
} else {
  
  $html = str_replace("{img_perfil}",'<i class="fa-solid fa-user"></i>',$html);
  $html = str_replace("{style_perfil}","bg-secondary profile",$html);
}

$html = str_replace("{navbar}",$navbar,$html);
$html = str_replace("{logo_header}","{include_path}public/default/images/logo.png",$html);
$html = str_replace("{include_path}",INCLUDE_PATH,$html);

echo $html;
