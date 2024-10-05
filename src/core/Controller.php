<?php

class Controller {

	public function view($filename, $data = [])
	{

		$filename = str_replace(".", "/", $filename);

		require_once(__DIR__ . "/../view/" . $filename . ".php");

	}

}