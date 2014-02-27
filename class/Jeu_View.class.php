<?php
class Jeu_View 
	{
	private  $model;
	private  $controller;

	public final  function __construct(Jeu $_model, Jeu_Controller $_controller) 
		{
		$model = $_model;
		$controller = $_controller;
		}
	
	public final function AfficherDerniersJeux()
		{
		}
	}