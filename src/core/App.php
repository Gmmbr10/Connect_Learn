<?php

class App {

	public function __construct()
	{

		if ( empty($_GET["url"]) ) {

			header("location: /home");

		}

		$url = explode("/",strtolower($_GET["url"]));

		$controller_name = ucfirst($url[0]) . "Controller";
		$controller_path = $this->setControllerPath($controller_name);

		if ( !file_exists($controller_path) ) {

			$controller_name = "RepairController";
			$controller_path = $this->setControllerPath($controller_name);
		}

		require_once($controller_path);

		$controller = new $controller_name();

	}

	private function setControllerPath($controller_name)
	{
		return __DIR__ . "/../controller/".$controller_name.".php";
	}

}