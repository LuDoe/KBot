<?php
class Model
	{
	public $string;
	public $template;
	
	public function __construct()
		{
		$this->string = "Mon texte.. Cliquer ICI !";
		$this->template = 'tpl/template.php';
		}
	}
?>