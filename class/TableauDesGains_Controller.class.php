<?php
class TableauDesGains_Controller 
	{
	private $model;
	private $mysqli;
	
	public final  function __construct(TableauDesGains $_model) 
		{
		$this->model = $_model;
		$this->mysqli = $GLOBALS['mysqli'];
		}
		
	public final function ObtenirToutesLignes()
		{
		$req = "SELECT * FROM  tableaudesgains ORDER BY id DESC";
		$query = $this->mysqli->query($req);
		return $query;
		}

	public final  function VerifierLigne($listeDonnee, $nouvelleEnregistrement = false)
		{
		$error = false;
		if(!$nouvelleEnregistrement)
			{
			if(empty($listeDonnee['id']) || $listeDonnee['id'] == '')
				$error .= '<li>Aucun identifiant n\'a été sélectionné.</li>';
			}
			
		if(empty($listeDonnee['nombreJoue']) || $listeDonnee['nombreJoue'] == '')
			$error .= '<li>Vous devez définir combien de nombre ont été misés.</li>';
			
		if(empty($listeDonnee['nombreTrouve']) || $listeDonnee['nombreTrouve'] == '')
			$error .= '<li>Vous devez définir combien de nombre on été trouvés.</li>';
			
		if(empty($listeDonnee['mise']) || $listeDonnee['mise'] == '')
			$error .= '<li>Vous devez saisir une valeur pour la mise (de 1 à 10).</li>';
			
		if(empty($listeDonnee['gain']) || $listeDonnee['gain'] == '')
			$error .= '<li>Vous devez saisir une somme gagné.</li>';
			
		if((empty($listeDonnee['aVie']) && $listeDonnee['aVie'] != '0') || $listeDonnee['aVie'] == '' )
			$error .= '<li>Vous devez définir si c\'est un gain à vie.</li>';
			
		if(empty($listeDonnee['chanceGain']) || $listeDonnee['chanceGain'] == '')
			$error .= '<li>Vous devez saisir la chance de victoire avec le hazard.</li>';
			
		if(empty($listeDonnee['depense']) || $listeDonnee['depense'] == '')
			$error .= '<li>Vous devez saisir un montant dépensé.</li>';
					
		return $error;
		}
	}
?>