<?php
class Simulateur_View 
	{
	private  $model;
	private  $controller;
	
	public final  function __construct(Simulateur $_model, Facture_Controller $_controller) 
		{
		$this->model = $_model;
		$this->controller = $_controller;
		}

	public final  function AfficherStrategieJoueur() 
		{
		}

	public final  function FormulaireSimulationManuelle() 
		{
		}

	public final  function AfficherComparatifStrategieEtTechnique() 
		{
		}

	public final  function FormulaireSimulationGlobale() 
		{
		}
	}
?>