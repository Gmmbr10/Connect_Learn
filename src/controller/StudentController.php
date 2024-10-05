<?php

class StudentController extends Controller
{

	public function __construct()
	{

		$url = explode( "/" , str_replace("student/","",strtolower( $_GET["url"]) ) );

		$this->routes($url);
		
	}

	private function routes($url_model)
	{

		if ( empty($url_model[0]) ) {

			header("location: ./home");

		}

		if ( $url_model[0] == "home" ) {

			$this->view("student.home");

		}

	}

}