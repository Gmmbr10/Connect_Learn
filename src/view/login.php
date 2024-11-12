<?php

$html = file_get_contents("src/view/default_templates/login.html");

$html = str_replace("{include_path}",INCLUDE_PATH,$html);

$resultado = "";

if (!empty($data)) {

  if ($data) {

    $resultado = "<p class=\"alert\">" . $data[0] . "</p>";
  }
}

$html = str_replace("{resultado}", $resultado, $html);

echo $html;