<?php


$html = file_get_contents("src/view/default_templates/home.html");

$html = str_replace("{include_path}",INCLUDE_PATH,$html);

echo $html;