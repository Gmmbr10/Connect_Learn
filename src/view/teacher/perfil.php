<?php

$navbar = file_get_contents("src/view/teacher_templates/navbar.html");
$html = file_get_contents("src/view/default_templates/meu_perfil.html");

$header = file_get_contents("src/view/teacher_templates/header.html");
$html = str_replace("{header}",$header,$html);
$html = str_replace("{navbar}",$navbar,$html);
$html = str_replace("{include_path}",INCLUDE_PATH,$html);
$html = str_replace("{nome}",$_SESSION["usuario"]["usu_nome"],$html);
$html = str_replace("{email}",$_SESSION["usuario"]["usu_email"],$html);

if ( $_SESSION["usuario"]["usu_tel"] != null ) {

  $html = str_replace("{telefone}",$_SESSION["usuario"]["usu_tel"],$html);
} else {
  
  $html = str_replace("{telefone}","",$html);
}


echo $html;