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

		if ($url_model[0] == "desafios") {
			if (isset($_GET["action"]) && $_GET["action"] == "criar" && isset($_POST["desafio"])) {

				$foto = $this->model("FileModel")->post($_FILES["foto"]);

				$model = $this->model("DesafioModel")->post($foto["arq_id"]);

				$this->view("teacher.desafios", $model);

				return;
			}

			if (isset($_GET["desafio"]) && $_GET["action"] == "visualizar") {

				// if ( isset($_POST["id_foto"]) ) {

				// 	$dados = $this->model("FileModel")->path($_POST["id_foto"],$_FILES["foto"]);

				// 	die();

				// }

				if (isset($_POST["conteudo"])) {

					$model = $this->model("DesafioModel")->path();

					header("location: ./desafios");
				}

				$dados = $this->model("DesafioModel")->get(filter_input(INPUT_GET, "desafio", FILTER_DEFAULT));

				if ( $dados == false ) {
					header("location: ./desafios");
					return;
				}

				$this->view("teacher.desafios", ["desafio" => $dados]);
				return;
			}

			if (isset($_GET["action"]) && $_GET["action"] == "deletar" && isset($_GET["desafio"])) {

				$model = $this->model("DesafioModel")->delete($_GET["desafio"]);

				header("location: ./desafios");
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

				if ( $model == false ) {
					header("location: ./duvidas");
					return;
				}
				
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

		if ($url_model[0] == "comunidades") {

			if ( isset($_POST["comunidade"]) && $_GET["action"] == "editar" ) {

				$model = $this->model("ComunidadeModel")->path();

				header("location: ./comunidades");

			}
			
			if (isset($_POST["comunidade"]) && $_GET["action"] == "criar") {

				$model = $this->model("ComunidadeModel")->post();

				header("location: ./comunidades");
			}

			if (isset($_GET["action"]) && $_GET["action"] == "editar") {

				$model = $this->model("ComunidadeModel")->get($_GET["comunidade"]);

				$this->view("teacher.comunidade", $model);
				return;
			}

			if (isset($_GET["action"]) && $_GET["action"] == "deletar") {

				$model = $this->model("ComunidadeModel")->delete($_GET["comunidade"]);

				header("location: ./comunidades");
			}

			$model = $this->model("ComunidadeModel")->get();

			$this->view("teacher.comunidade", $model);
			return;
		}

		if ( $url_model[0] == "conteudos" ) {

			if ( isset($_GET["action"]) ) {

				if ( $_GET["action"] == "deletar" && isset($_GET["curso"]) ) {

					$model = $this->model("CursoModel")->delete($_GET["curso"]);

					header("location: ./conteudos");

				}
				
				if ( $_GET["action"] == "deletar" && isset($_GET["modulo"]) ) {

					$model = $this->model("ModuloModel")->delete($_GET["modulo"]);

					header("location: ./conteudos");

				}

				if ( $_GET["action"] == "deletar" && isset($_GET["aula"]) ) {
					$model = $this->model("AulaModel")->delete($_GET["aula"]);

					header("location: ./conteudos");
				}
				
				if ( $_GET["action"] == "criar" && isset($_POST["curso"]) ) {

					$model = $this->model("CursoModel")->post();

					header("location: ./conteudos");
				}

				if ( $_GET["action"] == "visualizar" ) {

					if ( isset($_GET["modulo"]) && isset($_POST["titulo"]) ) {
						$model = $this->model("AulaModel")->post();

						header("location: ./conteudos?action=visualizar&modulo=" . $_GET["modulo"]);
					}
					
					if ( isset($_GET["modulo"]) && isset($_POST["modulo"]) ) {

						$model = $this->model("ModuloModel")->path();

						header("location: ./conteudos?action=visualizar&modulo=" . $_GET["modulo"]);
						return;

					}
					
					if ( isset($_GET["curso"]) && isset($_POST["modulo"]) ) {

						$model = $this->model("ModuloModel")->post();

						header("location: ./conteudos?action=visualizar&curso=" . $_GET["curso"]);
					}

					if ( isset($_GET["aula"]) ) {

						if ( isset($_POST["titulo"]) ) {

							$model = $this->model("AulaModel")->path();

							header("location: ./conteudos?action=visualizar&aula=" . $_GET["aula"]);
						}

						$aula = $this->model("AulaModel")->getAula($_GET["aula"]);
						
						$this->view("teacher.conteudos",$aula);
						return;
					}
					
					if ( isset($_GET["modulo"]) ) {

						$modulo = $this->model("ModuloModel")->getModulo($_GET["modulo"]);
						$aula = $this->model("AulaModel")->get($_GET["modulo"]);

						if ($aula == false || $modulo == false) {

							header("location: ./conteudos");
						}

						$this->view("teacher.conteudos",["modulo" => $modulo , "aulas" => $aula ]);
						return;

					}

					if ( isset($_POST["curso"]) ) {

						$model = $this->model("CursoModel")->path();

						header("location: ./conteudos?action=visualizar&curso=" . $_GET["curso"]);
					}

					$model = $this->model("CursoModel")->get($_GET["curso"]);

					if ( $model == false ) {

						header("location: ./conteudos");
					}

					$curso = $this->model("CursoModel")->get($_GET["curso"]);
					$modulo = $this->model("ModuloModel")->get($_GET["curso"]);

					$this->view("teacher.conteudos",["curso" => $curso,"modulo" => $modulo]);
					return;
				}

			}
			
			$model = $this->model("CursoModel")->get();
			
			$this->view("teacher.conteudos",$model);
			return;
		}

		$this->view("teacher.home");
		return;
	}
}
