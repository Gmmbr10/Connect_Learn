<?php

$navbar = file_get_contents("src/view/teacher_templates/navbar.html");
$html = file_get_contents("src/view/teacher_templates/conteudos.html");

if ( isset($_GET["action"]) && $_GET["action"] == "criar" ) {

  $html = file_get_contents("src/view/teacher_templates/criar_curso.html");
  
} else if ( isset($_GET["action"]) && $_GET["action"] == "visualizar" && isset($_GET["curso"]) ) {
  
  $html = file_get_contents("src/view/teacher_templates/curso.html");
  $html = str_replace("{id_curso}",$_GET["curso"],$html);
  $html = str_replace("{titulo}",$data["curso"]["cur_nome"],$html);

  if ( $data["curso"]["cur_tema"] == 1 ) {
    $html = str_replace("{tema_1}","selected",$html);
  } else {
    $html = str_replace("{tema_1}","",$html);
  }

  if ( $data["curso"]["cur_tema"] == 2 ) {
    $html = str_replace("{tema_2}","selected",$html);
  } else {
    $html = str_replace("{tema_2}","",$html);
  }

  if ( $data["curso"]["cur_tema"] == 3 ) {
    $html = str_replace("{tema_3}","selected",$html);
  } else {
    $html = str_replace("{tema_3}","",$html);
  }

  $html = str_replace("{modulo}",$data["modulo"],$html);
  
} else if ( isset($_GET["action"]) && $_GET["action"] == "visualizar" && isset($_GET["modulo"]) ) {

  $html = file_get_contents("src/view/teacher_templates/modulo.html");
  $html = str_replace("{id_curso}",$data["modulo"]["cur_id"],$html);
  $html = str_replace("{id_modulo}",$data["modulo"]["mod_id"],$html);
  $html = str_replace("{titulo}",$data["modulo"]["cur_nome"],$html);
  $html = str_replace("{titulo_modulo}",$data["modulo"]["mod_nome"],$html);

  $html = str_replace("{aulas}",$data["aulas"],$html);
  $html = str_replace("{modulo_nome}",$data["modulo"]["mod_nome"],$html);

} else if ( isset($_GET["action"]) && $_GET["action"] == "visualizar" && isset($_GET["aula"]) ) {

  $html = file_get_contents("src/view/teacher_templates/aula.html");
  $html = str_replace("{id_curso}",$data["cur_id"],$html);
  $html = str_replace("{id_modulo}",$data["mod_id"],$html);
  $html = str_replace("{id_aula}",$data["aul_id"],$html);
  $html = str_replace("{titulo_curso}",$data["cur_nome"],$html);
  $html = str_replace("{titulo_modulo}",$data["mod_nome"],$html);
  $html = str_replace("{titulo}",$data["aul_titulo"],$html);
  $html = str_replace("{conteudo}",$data["aul_conteudo"],$html);

  if ( $data["aul_url"] != null ) {
    $html = str_replace("{video}",$data["aul_url"],$html);
  } else {
    $html = str_replace("{video}","",$html);
  }

} else {

  $html = str_replace("{conteudos}",$data,$html);

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

$html = str_replace("{logo_header}","{include_path}public/default/images/logo.png",$html);
$html = str_replace("{navbar}",$navbar,$html);
$html = str_replace("{include_path}",INCLUDE_PATH,$html);

echo $html;