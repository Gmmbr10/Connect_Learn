<?php

class Controller
{

	public function view($filename, $data = [])
	{

		$filename = str_replace(".", "/", $filename);

		require_once(__DIR__ . "/../view/default_templates/start_base.php");
		require_once(__DIR__ . "/../view/" . $filename . ".php");
		require_once(__DIR__ . "/../view/default_templates/end_base.html");
	}

	public function model($modelname)
	{

		require_once(__DIR__ . "/../model/" . $modelname . ".php");
		return new $modelname;
	}
}
