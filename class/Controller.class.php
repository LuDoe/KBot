<?php
class Controller
	{
	private $model;
	
	public function __construct($_model)
		{
		$this->model = $_model;
		}
		
	public function clicked()
		{
		$this->model->string = "Le texte � �t� mis � jours.";
		}
	}
?>