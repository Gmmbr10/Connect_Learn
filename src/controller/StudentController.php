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

		if ($url_model[0] == "desafio") {
			if (empty($_GET["codigo"])) {
				header("location: " . INCLUDE_PATH . "student/desafios");
			}

			$this->view("student.desafio");
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

		if ($url_model[0] == "equipe") {

			if (empty($_GET["desafio"])) {
				header("location: " . INCLUDE_PATH . "student/desafios");
			}

			if ($url_model[1] == "criar") {

				$this->view("student.criar_equipe");
				return;
			} else if ($url_model[1] == "juntar") {

				$this->view("student.juntar_equipe");
				return;
			} else {

				header("location: " . INCLUDE_PATH . "student/desafios");
			}
		}

		if ($url_model[0] == "suporte") {

			$this->view("student.suporte");
			return;
		}

		$this->view("student.home");
		return;
	}
}
