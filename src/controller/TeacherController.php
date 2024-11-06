<?php

class TeacherController extends Controller
{

	public function __construct()
	{

		session_start();

		if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["usu_tipo"] != 2) {

			session_destroy();
			header("location: ../login");
		}

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

		if ($url_model[0] == "sair") {
			session_destroy();
			header("location: ../login");
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

			$this->view("teacher.desafio");
			return;
		}

		if ($url_model[0] == "desafios") {
			if (isset($_GET["action"]) && $_GET["action"] == "criar" && isset($_POST["desafio"])) {

				$model = $this->model("DesafioModel")->post();

				$this->view("teacher.desafios", $model);

				return;
			}

			$dados = $this->model("DesafioModel")->get();

			$this->view("teacher.desafios",["desafios"=>$dados]);
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
