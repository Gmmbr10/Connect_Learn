<?php

class StudentController extends Controller
{

	public function __construct()
	{

		session_start();

		if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["usu_tipo"] != 1) {

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

		if ($url_model[0] == "deletar") {

			$model = $this->model("UsuarioModel")->deletar();

			session_destroy();
			header("location: ../home");
		}

		if ($url_model[0] == "deletar_pergunta") {

			$model = $this->model("DuvidaModel")->delete($_GET["duvida"]);

			header("location: ./home");
		}

		if ($url_model[0] == "deletar_resposta") {

			$model = $this->model("RespostaModel")->delete($_GET["resposta"]);

			header("location: ./duvidas");
		}

		if ($url_model[0] == "conteudos") {

			if (isset($_GET["nucleo"])) {
				if ($_GET["nucleo"] == 1) {

					$model = $this->model("CursoModel")->get($_GET["nucleo"]);
				} else if ($_GET["nucleo"] == 2) {

					$model = $this->model("CursoModel")->get($_GET["nucleo"]);
				} else if ($_GET["nucleo"] == 3) {

					$model = $this->model("CursoModel")->get($_GET["nucleo"]);
				} else {

					$this->view("student.conteudos");
					return;
				}

				$this->view("student.conteudos", $model);
				return;
			}

			$this->view("student.conteudos");
			return;
		}

		if ($url_model[0] == "desafios") {

			if (isset($_GET["desafio"]) && !empty($_GET["desafio"])) {

				if (isset($_POST["equipe"])) {

					$model = $this->model("GrupoModel")->post();

					header("location: ./desafios");
				}

				if (isset($_GET["action"]) && $_GET["action"] == "juntar equipe" && isset($_POST["id_equipe"])) {

					$model = $this->model("GrupoModel")->juntar();

					header("location: ./desafios");
				}

				if (isset($_GET["desafio"]) && $_GET["action"] == "juntar equipe") {

					$dados = $this->model("DesafioModel")->get(filter_input(INPUT_GET, "desafio", FILTER_DEFAULT));
					$model = $this->model("GrupoModel")->get();

					$this->view("student.desafios", ["desafios" => $dados, "desafio" => $model]);
					return;
				}
				$dados = $this->model("DesafioModel")->get(filter_input(INPUT_GET, "desafio", FILTER_DEFAULT));

				$this->view("student.desafios", ["desafio" => $dados]);
				return;
			}


			$dados = $this->model("DesafioModel")->get();

			$this->view("student.desafios", ["desafios" => $dados]);
			return;
		}

		if ($url_model[0] == "duvidas") {

			if (isset($_GET["duvida"]) && isset($_POST["conteudo"])) {

				$model = $this->model("DuvidaModel")->path();

				header("location: ./duvidas?action=ver respostas?duvida=" . $_GET["duvida"]);
			}

			if (isset($_GET["action"]) and $_GET["action"] == "escrever" and isset($_POST["conteudo"])) {

				$model = $this->model("DuvidaModel")->post();

				$this->view("student.duvidas", $model);

				return;
			}

			if (isset($_GET["action"]) && $_GET["action"] == "escrever") {

				$this->view("student.duvidas");
				return;
			}

			if (isset($_GET["action"]) && $_GET["action"] == "responder") {
				if (empty($_GET["duvida"])) {

					header("location: " . INCLUDE_PATH . "student/duvidas");
				}

				if (isset($_POST["duvida"]) && !empty($_POST["duvida"])) {

					$model = $this->model("RespostaModel")->post();

					header("location: " . INCLUDE_PATH . "student/duvidas?action=responder&duvida=" . $_GET["duvida"]);
				}

				$model = $this->model("DuvidaModel")->get($_GET["duvida"]);

				$this->view("student.duvidas", $model);
				return;
			}

			if (isset($_GET["action"]) && $_GET["action"] == "ver respostas") {
				if (empty($_GET["duvida"])) {

					header("location: " . INCLUDE_PATH . "student/duvidas");
				}

				$model = $this->model("DuvidaModel")->get($_GET["duvida"]);

				$this->view("student.duvidas", $model);
				return;
			}
			$model = $this->model("DuvidaModel")->get();

			$this->view("student.duvidas", ["duvidas" => $model]);
			return;
		}

		if ($url_model[0] == "suporte") {

			$this->view("student.suporte");
			return;
		}

		if ($url_model[0] == "perfil") {
			if (isset($_POST["senha"])) {

				$model = $this->model("UsuarioModel")->atualizarSenha();
				
				header("location: ./perfil");
			}

			if (isset($_POST["nome"])) {

				$model = $this->model("UsuarioModel")->atualizar();
				
				header("location: ./perfil");
			}
			$this->view("student.perfil");
			return;
		}

		$this->view("student.home");
		return;
	}
}
