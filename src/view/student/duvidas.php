<?php

$navbar = file_get_contents("src/view/student_templates/navbar.html");
$html = file_get_contents("src/view/student_templates/duvidas.html");

if ( isset($_GET["action"]) && $_GET["action"] == "escrever" ) {
  
  $html = file_get_contents("src/view/student_templates/form_duvida.html");
  
  $resultado = "";

  if (!empty($data)) {

    if ($data == true) {
  
      $resultado = "<p class=\"alert\">Dúvida inserida com sucesso!</p>";
    } else {
  
      $resultado = "<p class=\"alert\">Houve algum erro durante o processo :(</p>";
    }
  }

  $html = str_replace("{resultado}",$resultado,$html);

}

if ( isset($_GET["action"]) && $_GET["action"] == "responder" ) {
  
  $html = file_get_contents("src/view/student_templates/responder_duvida.html");
  $html = str_replace("{respostas}",$data["respostas"],$html);
  $html = str_replace("{usuario_fez_pergunta}",$data["duvida"]["usu_nome"],$html);
  $html = str_replace("{duvida}",$data["duvida"]["duv_texto"],$html);

}

if ( isset($_GET["action"]) && $_GET["action"] == "ver respostas" ) {
  
  $html = file_get_contents("src/view/student_templates/ver_respostas.html");
  $html = str_replace("{respostas}",$data["respostas"],$html);
  $html = str_replace("{duvida}",$data["duvida"]["duv_texto"],$html);

}

if ( isset($data["duvidas"]) ) {

  $html = str_replace("{minhas_duvidas}",$data["duvidas"]["minhas"],$html);
  $html = str_replace("{outras_duvidas}",$data["duvidas"]["outras"],$html);

}

$navbar = str_replace("{include_path}",INCLUDE_PATH,$navbar);
$html = str_replace("{navbar}",$navbar,$html);
$html = str_replace("{include_path}",INCLUDE_PATH,$html);

echo $html;