<?php

class TeacherController extends Controller
{

	public function __construct()
	{

		$url = explode("/", str_replace("teacher/", "", strtolower($_GET["url"])));

		$this->routes($url);
	}

	private function routes($url_model)
	{

		if ($url_model[0] == "teacher") {

			header("location: ./teacher/home");
		}

		if (empty($url_model[0])) {

			header("location: ./home");
		}

		if ($url_model[0] == "conteudos") {

			if (!empty($url_model[1])) {

				if ($url_model[1] == "criar_curso") {

					$this->view("teacher.criar_lista_conteudo");
					return;
				}

				if ($url_model[1] == "criar_modulo") {

					$this->view("teacher.adicionar_modulo");
					return;
				}

				if ($url_model[1] == "criar_aula") {

					$this->view("teacher.adicionar_conteudo");
					return;
				}
			}

			$this->view("teacher.conteudos");
			return;
		}

		if ($url_model[0] == "desafio") {
			if (empty($_GET["codigo"])) {
				header("location: " . INCLUDE_PATH . "teacher/desafios");
			}

			$this->view("teacher.desafio");
			return;
		}

		if ($url_model[0] == "desafios") {
			if (!empty($url_model[1])) {

				if ($url_model[1] == "criar_desafio") {

					$this->view("teacher.criar_desafio");
					return;
				}
			}

			$this->view("teacher.desafios");
			return;
		}

		if ($url_model[0] == "duvidas") {

			$this->view("teacher.duvidas");
			return;
		}

		if ($url_model[0] == "equipe") {

			if (empty($_GET["desafio"])) {
				header("location: " . INCLUDE_PATH . "teacher/desafios");
			}

			if ($url_model[1] == "criar") {

				$this->view("teacher.criar_equipe");
				return;
			} else if ($url_model[1] == "juntar") {

				$this->view("teacher.juntar_equipe");
				return;
			} else {

				header("location: " . INCLUDE_PATH . "teacher/desafios");
			}
		}

		if ($url_model[0] == "suporte") {

			$this->view("teacher.suporte");
			return;
		}

		$this->view("teacher.home");
		return;
	}
}
