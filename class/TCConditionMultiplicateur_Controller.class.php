<?php
class TCConditionMultiplicateur_Controller 
	{
	private  $model;
	private $mysqli;

	public final  function __construct(TCConditionMultiplicateur $_model) 
		{
		$this->model = $_model;
		$this->mysqli = $GLOBALS['mysqli'];
		}
	
	public final function ListerTechnique()
		{
		$req = "SELECT * FROM tcconditionmultiplicateur ORDER BY titre ASC";
		$query = $this->mysqli->query($req);
		return $query;
		}
	
	public final function VerifierInfo($listeDonnee, $nouvelleEnregistrement = false)
		{
		$error = false;
		if(!$nouvelleEnregistrement)
			{
			if(empty($listeDonnee['id']) || $listeDonnee['id'] == '')
				$error .= '<li>Aucun identifiant n\'a �t� s�lectionn�.</li>';
			}
			
		if(empty($listeDonnee['titre']) || $listeDonnee['titre'] == '')
			$error .= '<li>Vous devez saisir un titre.</li>';
			
		if(empty($listeDonnee['texteDescription']) || $listeDonnee['texteDescription'] == '')
			$error .= '<li>Vous devez saisir une description.</li>';
					
		return $error;
		}
	}
?>