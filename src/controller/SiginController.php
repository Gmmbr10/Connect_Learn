<?php

class SiginController extends Controller
{

	private $model = null;
	
	public function __construct()
	{

		if ( isset($_POST["nome"]) ) {
			
			$model = $this->model("SiginModel")->post();

			$this->view("sigin",$model);

		}
		
		$this->view("sigin");
	}

}