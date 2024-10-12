<?php

class StudentController extends Controller
{

	public function __construct()
	{

		$url = explode("/", str_replace("student/", "", strtolower($_GET["url"])));

		$this->routes($url);
	}

	private function routes($url_model)
	{

		if ($url_model[0] == "student") {

			header("location: ./student/home");
		}

		if (empty($url_model[0])) {

			header("location: ./home");
		}

		if ($url_model[0] == "conteudos") {

			$this->view("student.conteudos");
			return;
		}

		if ($url_model[0] == "desafios") {

			$this->view("student.desafios");
			return;
		}

		if ($url_model[0] == "duvidas") {

			$this->view("student.duvidas");
			return;
		}

		if ($url_model[0] == "suporte") {

			$this->view("student.suporte");
			return;
		}

		$this->view("student.home");
		return;
	}
}
