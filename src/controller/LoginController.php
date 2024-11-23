<?php

class LoginController extends Controller
{

	public function __construct()
	{

		if ( isset($_POST["email"]) ) {

			$model = $this->model("LoginModel")->search();

			if ( !is_array($model) && !empty($_SESSION["usuario"]) ) {

				if ( $_SESSION["usuario"]["usu_tipo"] == 1 ) {

					header("location: ./student/home");

				}

				if ( $_SESSION["usuario"]["usu_tipo"] == 2 ) {

					header("location: ./teacher/home");

				}

				if ( $_SESSION["usuario"]["usu_tipo"] == 3 ) {

					header("location: ./admin/home");

				}
				
				return;
				
			}

			
			$this->view("login",$model);
			
			return;

		}
		
		$this->view("login");
	}

}