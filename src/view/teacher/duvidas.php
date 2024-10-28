<?php

$navbar = file_get_contents("src/view/teacher_templates/navbar.html");
$html = file_get_contents("src/view/teacher_templates/duvidas.html");

if ( isset($_GET["action"]) && $_GET["action"] == "responder" ) {
  
  $html = file_get_contents("src/view/teacher_templates/responder_duvida.html");

}

$navbar = str_replace("{include_path}",INCLUDE_PATH,$navbar);
$html = str_replace("{navbar}",$navbar,$html);
$html = str_replace("{include_path}",INCLUDE_PATH,$html);

echo $html;