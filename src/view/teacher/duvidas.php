<?php

$navbar = file_get_contents("src/view/teacher_templates/navbar.html");
$html = file_get_contents("src/view/teacher_templates/duvidas.html");

if ( isset($_GET["action"]) && $_GET["action"] == "responder" ) {
  
  $html = file_get_contents("src/view/teacher_templates/responder_duvida.html");

}

if ( isset($data["outras"]) ) {

  $html = str_replace("{outras_duvidas}",$data["outras"],$html);

}

if ( isset($_GET["action"]) && $_GET["action"] == "responder" ) {
  
  $html = file_get_contents("src/view/teacher_templates/responder_duvida.html");
  $html = str_replace("{respostas}",$data["respostas"],$html);
  $html = str_replace("{usuario_fez_pergunta}",$data["duvida"]["usu_nome"],$html);
  $html = str_replace("{duvida}",$data["duvida"]["duv_texto"],$html);
  $html = str_replace("{id_duvida}",$data["duvida"]["duv_id"],$html);

}

$navbar = str_replace("{include_path}",INCLUDE_PATH,$navbar);
$html = str_replace("{navbar}",$navbar,$html);
$html = str_replace("{include_path}",INCLUDE_PATH,$html);

echo $html;