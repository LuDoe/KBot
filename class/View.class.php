<?php
class View
	{
	private $model;
	private $controller;
	
	public function __construct($_model, $_controller)
		{
		$this->model = $_model;
		$this->controller = $_controller;
		}
		
	public function output()
		{
		$data = '<p><a href="index.php?action=clicked">'.$this->model->string.'</a></p>';
		require_once($this->model->template);
		}
	}
?>