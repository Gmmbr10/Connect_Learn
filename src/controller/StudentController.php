<?php

class StudentController extends Controller
{

	public function __construct()
	{

		$url = explode( "/" , strtolower( $_GET["url"] ) );

		array_splice($url, 0,1);

		if ( $url[0] == "home" ) {

			$this->view("student.home");

		}
		
	}

}