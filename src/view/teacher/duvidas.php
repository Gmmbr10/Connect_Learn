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