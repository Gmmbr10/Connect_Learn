<?php

class StudentController extends Controller
{

	public function __construct()
	{

		session_start();
		
		if ( !isset($_SESSION["usuario"]) || $_SESSION["usuario"]["usu_tipo"] != 1 ) {

			session_destroy();
			header("location: ../login");

		}
		
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

		if ($url_model[0] == "sair") {
			session_destroy();
			header("location: ../login");
		}

		if ($url_model[0] == "conteudos") {

			$this->view("student.conteudos");
			return;
		}

		if ($url_model[0] == "desafios") {

			if ( isset($_GET["desafio"]) && !empty($_GET["desafio"]) ) {
				$dados = $this->model("DesafioModel")->get(filter_input(INPUT_GET,"desafio",FILTER_DEFAULT));

				$this->view("student.desafios",["desafio" => $dados]);
				return;
			}
			
			$dados = $this->model("DesafioModel")->get();

			$this->view("student.desafios",["desafios" => $dados]);
			return;
		}

		if ($url_model[0] == "duvidas") {

			if ( isset($_GET["action"]) and $_GET["action"] == 	"escrever" and isset($_POST["conteudo"]) ) {

				$model = $this->model("DuvidaModel")->post();

				$this->view("student.duvidas",$model);

				
				return;
				
			}

			if ( isset($_GET["action"]) && $_GET["action"] == "escrever" ) {

			$this->view("student.duvidas");
			return;
		}
			$model = $this->model("DuvidaModel")->get();
			
			$this->view("student.duvidas",["duvidas"=>$model]);
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
