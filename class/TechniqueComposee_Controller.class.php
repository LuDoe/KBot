<?php
class TechniqueComposee_Controller 
	{
	private  $model;
	private $mysqli;
	
	public final  function __construct(TechniqueComposee $_model)
		{
		$this->model = $_model;
		$this->mysqli = $GLOBALS['mysqli'];
		}

	public final  function DemandeCalculStatistique() 
		{
		}

	public final  function EnregistrerTechniqueComposee($listeDonnee) 
		{
		}

	public final  function ModifierVersion() 
		{
		}

	public final  function EnregistrerNouvelleTechnique($listeDonnee) 
		{
		}

	public final  function CalculerNiveauTechnique() 
		{
		}

	public final  function RechercherJeuEnSimulation() 
		{
		}
		
	public final function VerifierTechnique($listeDonnee, $nouvelleEnregistrement = false)
		{
		$error = false;
		if(!$nouvelleEnregistrement)
			{
			if(empty($listeDonnee['id']) || $listeDonnee['id'] == '')
				$error .= '<li>Aucun identifiant n\'a été sélectionné.</li>';
			}
			
		if(empty($listeDonnee['nom']) || $listeDonnee['nom'] == '')
			$error .= '<li>Vous devez saisir un titre pour la technique.</li>';
			
		if(empty($listeDonnee['variante'])  || $listeDonnee['variante'] == '')
			$error .= '<li>Vous devez saisir le nom de la variante ("originale" si ce n\'est pas une variante.).</li>';
			
		if(empty($listeDonnee['version']) || $listeDonnee['version'] == '')
			$error .= '<li>Vous devez saisir version pour la technique (1.0, 1.1, 2.0, ...).</li>';
			
		if(empty($listeDonnee['niveau']) || $listeDonnee['niveau'] == '')
			$error .= '<li>Vous devez saisir le niveau de la technique (1 par défaut).</li>';
						
		if(empty($listeDonnee['jeuNumero']) || $listeDonnee['jeuNumero'] == '0')
			$error .= '<li>Vous devez choisir un méthode de sélection des numéros.</li>';
						
		if(empty($listeDonnee['jeuGrille']) || $listeDonnee['jeuGrille'] == '0')
			$error .= '<li>Vous devez choisir un méthode de choix du nombre de grille.</li>';
						
		if(empty($listeDonnee['jeuPeriode']) || $listeDonnee['jeuPeriode'] == '0')
			$error .= '<li>Vous devez choisir un méthode de sélection de période de jeu.</li>';
						
		if(empty($listeDonnee['jeuMise']) || $listeDonnee['jeuMise'] == '0')
			$error .= '<li>Vous devez choisir un méthode de choix du montant des mises.</li>';
						
		if(empty($listeDonnee['jeuMultiplicateur']) || $listeDonnee['jeuMultiplicateur'] == '0')
			$error .= '<li>Vous devez choisir un méthode de sélection du multiplicateur.</li>';
					
		return $error;
		}

	public final  function RechercherLesTechniquesComposees() 
		{
		$req = "SELECT * FROM techniquecomposee";
		$query = $this->mysqli->query($req);
		$rows_count = $query->num_rows;
		if($rows_count == 0)
			return false;
		else
			return $query;
		}
	}
?>