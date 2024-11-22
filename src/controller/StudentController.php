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

			if ( isset($_GET["action"]) && $_GET["action"] == "visualizar" && isset($_GET["aula"]) && !empty($_GET["aula"]) ) {

				$model = $this->model("ConteudoModel")->getAula($_GET["aula"]);

				if ( $model == false ) {
					header("location: ./conteudos");
					return;
				}
				
				$this->view("student.conteudos", $model);
				return;
			}
			
			if ( isset($_GET["action"]) && $_GET["action"] == "visualizar" && isset($_GET["curso"]) && !empty($_GET["curso"]) ) {

				$model = $this->model("ConteudoModel")->getCurso($_GET["curso"]);

				if ( $model == false ) {
					header("location: ./conteudos");
					return;
				}
				$this->view("student.conteudos", $model);
				return;
			}
			
			if (isset($_GET["nucleo"])) {
				if ($_GET["nucleo"] == 1) {

					$model = $this->model("ConteudoModel")->getCursos($_GET["nucleo"]);
				} else if ($_GET["nucleo"] == 2) {

					$model = $this->model("ConteudoModel")->getCursos($_GET["nucleo"]);
				} else if ($_GET["nucleo"] == 3) {

					$model = $this->model("ConteudoModel")->getCursos($_GET["nucleo"]);
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

				$dados = $this->model("DesafioModel")->get(filter_input(INPUT_GET, "desafio", FILTER_DEFAULT));

				if ( $dados == false ) {
					header("location: ./desafios");
					return;
				}

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

				if ( $model == false ) {
					header("location: ./duvidas");
					return;
				}

				$this->view("student.duvidas", $model);
				return;
			}

			if (isset($_GET["action"]) && $_GET["action"] == "ver respostas") {
				if (empty($_GET["duvida"])) {

					header("location: " . INCLUDE_PATH . "student/duvidas");
				}

				$model = $this->model("DuvidaModel")->get($_GET["duvida"]);

				if ( $model == false ) {
					header("location: ./duvidas");
					return;
				}
				
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
			if (isset($_FILES["foto"])) {

				$model = $this->model("FileModel")->post($_FILES["foto"]);

				$_SESSION["usuario"]["usu_id_foto"] = $model["arq_id"];
				$_SESSION["usuario"]["arq_caminho"] = $model["arq_caminho"];

				$model = $this->model("UsuarioModel")->atualizarFoto($model["arq_id"]);

	
				header("location: ./perfil");
			}
			
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

		if ($url_model[0] == "comunidades") {
			
			$model = $this->model("ComunidadeModel")->get();
			
			$this->view("student.comunidade",$model);
			return;
		}

		$this->view("student.home");
		return;
	}
}
