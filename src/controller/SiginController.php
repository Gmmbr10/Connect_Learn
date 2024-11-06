<?php

class SiginController extends Controller
{

	public function __construct()
	{

		if ( isset($_POST["nome"]) ) {
			
			$model = $this->model("SiginModel")->post();

			$this->view("sigin",$model);

			return;

		}
		
		$this->view("sigin");
	}

}