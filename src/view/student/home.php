<?php

$navbar = file_get_contents("src/view/student_templates/navbar.html");
$html = file_get_contents("src/view/student_templates/home.html");

$navbar = str_replace("{include_path}",INCLUDE_PATH,$navbar);
$html = str_replace("{navbar}",$navbar,$html);

echo $html;