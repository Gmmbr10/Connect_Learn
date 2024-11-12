<?php

$navbar = file_get_contents("src/view/teacher_templates/navbar.html");
$html = file_get_contents("src/view/teacher_templates/comunidades.html");

if ( isset($_GET["action"]) && $_GET["action"] == "criar" ) {
  
  $html = file_get_contents("src/view/teacher_templates/criar_comunidade.html");
}

if ( isset($_GET["action"]) && $_GET["action"] == "editar" ) {
  
  $html = file_get_contents("src/view/teacher_templates/editar_comunidade.html");
  $html = str_replace("{id}",$data["com_id"],$html);
  $html = str_replace("{nome}",$data["com_nome"],$html);
  $html = str_replace("{link}",$data["com_link"],$html);
}

$header = file_get_contents("src/view/teacher_templates/header.html");
$html = str_replace("{header}",$header,$html);

if ( $_SESSION["usuario"]["usu_id_foto"] != null ) {

  $html = str_replace("{img_perfil}",'<img src="'.$_SESSION["usuario"]["arq_caminho"].'"/>',$html);
  $html = str_replace("{style_perfil}","profile",$html);
} else {
  
  $html = str_replace("{img_perfil}",'<i class="fa-solid fa-user"></i>',$html);
  $html = str_replace("{style_perfil}","bg-secondary profile",$html);
}

if ( !isset($_GET["action"]) ) {

  $html = str_replace("{comunidades}",$data,$html);
}

$html = str_replace("{logo_header}","{include_path}public/default/images/logo.png",$html);
$html = str_replace("{navbar}",$navbar,$html);
$html = str_replace("{include_path}",INCLUDE_PATH,$html);

echo $html;