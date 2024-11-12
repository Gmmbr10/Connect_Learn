<?php

$html = file_get_contents("src/view/default_templates/sigin.html");

$html = str_replace("{include_path}", INCLUDE_PATH, $html);

$resultado = "";

if (!empty($data)) {

  if ($data == true) {

    $resultado = "<p class=\"alert\">Conta criada com sucesso!</p>";
  } else {

    $resultado = "<p class=\"alert\">Houve algum erro durante o processo :(</p>";
  }
}

$html = str_replace("{resultado}", $resultado, $html);

echo $html;
