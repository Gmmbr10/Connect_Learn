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

			if (isset($_POST["curso"])) {

				$model = $this->model("CursoModel")->post();

				header("location: ./conteudos?action=criar conteudo");
			}

			if (isset($_POST["modulo"])) {

				$model = $this->model("ModuloModel")->post();

				header("location: ./conteudos?action=criar conteudo");
			}

			if (isset($_POST["titulo"])) {

				$model = $this->model("AulaModel")->post();

				header("location: ./conteudos?action=criar conteudo");
			}

			if (isset($_GET["action"]) && $_GET["action"] == "criar conteudo") {

				$modulos = $this->model("ModuloModel")->getCursos();
				$cursos = $this->model("ModuloModel")->get();

				$this->view("teacher.conteudos", ["cursos" => $cursos, "modulos" => $modulos]);
				return;
			}

			$model = $this->model("CursoModel")->get();

			$this->view("teacher.conteudos", $model);
			return;
		}

		if ($url_model[0] == "desafios") {
			if (isset($_GET["action"]) && $_GET["action"] == "criar" && isset($_POST["desafio"])) {

				$foto = $this->model("FileModel")->post($_FILES["foto"]);
				
				$model = $this->model("DesafioModel")->post($foto["arq_id"]);
				
				$this->view("teacher.desafios", $model);

				return;
			}

			$dados = $this->model("DesafioModel")->get();

			$this->view("teacher.desafios", ["desafios" => $dados]);
			return;
		}

		if ($url_model[0] == "duvidas") {
			if (isset($_GET["action"]) && $_GET["action"] == "responder") {
				if (empty($_GET["duvida"])) {

					header("location: " . INCLUDE_PATH . "teacher/duvidas");
				}

				if (isset($_POST["duvida"]) && !empty($_POST["duvida"])) {

					$model = $this->model("RespostaModel")->post();

					header("location: " . INCLUDE_PATH . "teacher/duvidas?action=responder&duvida=" . $_GET["duvida"]);
				}

				$model = $this->model("DuvidaModel")->get($_GET["duvida"]);

				$this->view("teacher.duvidas", $model);
				return;
			}

			$model = $this->model("DuvidaModel")->get();

			$this->view("teacher.duvidas", $model);
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

			$this->view("teacher.perfil");
			return;
		}

		$this->view("teacher.home");
		return;
	}
}
