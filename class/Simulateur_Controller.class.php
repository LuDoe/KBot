<?php
class Simulateur_Controller 
	{
	private  $model;
	private $mysqli;

	public final  function __construct(Simulateur $_model) 
		{
		$this->model = $_model;
		$this->mysqli = $GLOBALS['mysqli'];
		}
	
	public final  function DemarrerJeuEnCours() 
		{
		}
	
	public final  function DemarrerJeuEnSimulation() 
		{
		}
	
	public final  function TesterFormSimulationManuelle($listeDonnee) 
		{
		}
	
	public final  function DemarrerSimulationManuelle($listeDonnee) 
		{
		}
	
	public final  function DemarrerSimulationGlobale() 
		{
		}
	
	public final  function CompleterStatistiqueEnCoursEtSimulation() 
		{
		}
	
	public final  function RechercherStatistiqueStrategieEtTechnique() 
		{
		}
	}
?>