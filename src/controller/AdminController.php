<?php

class AdminController extends Controller
{

	public function __construct()
	{

		session_start();

		if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["usu_tipo"] != 3) {

			session_destroy();
			header("location: ../login");
		}

		$url = explode("/", str_replace("admin/", "", strtolower($_GET["url"])));

		$this->routes($url);
	}

	private function routes($url_model)
	{

		if (empty($url_model[0])) {

			header("location: ./home");
		}

		if ($url_model[0] == "sair") {
			session_destroy();
			header("location: ../login");
		}

		if ($url_model[0] == "comunidades") {

			if ( isset($_POST["comunidade"]) && $_GET["action"] == "editar" ) {

				$model = $this->model("ComunidadeModel")->path();

				header("location: ./comunidades");

			}

			if (isset($_GET["action"]) && $_GET["action"] == "editar") {

				$model = $this->model("ComunidadeModel")->get($_GET["comunidade"]);

				$this->view("admin.comunidade", $model);
				return;
			}

			$model = $this->model("ComunidadeModel")->get();

			$this->view("admin.comunidade", $model);
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
			$this->view("admin.perfil");
			return;
		}

		$this->view("admin.home");
		return;
		
	}
}
