<?php
class TCConditionMultiplicateur 
	{
	private $identifiant;
	private $dateDebut;
	private $nombreTirage;
	private $titre;
	private $conditionMultiplicateurFormatee;
	private $avoirMultiplicateur = false;
	private $typeMultiplicateur;
	private $valeurMultiplicateur;
	private $mysqli;
	
	public function __construct($messageDemande = false)
		{
		// MULTIPLICATEUR[id:nbr_tirage;date_debut;ARG_1;ARG_N]
		if(!$messageDemande)
			$messageDemande = 'MULTIPLICATEUR[1;0;2009-01-01;ARG_1;ARG_N]';
		$extractStart = strpos($messageDemande, 'MULTIPLICATEUR[')+15;
		$extractEnd = strpos($messageDemande, ']', $extractStart);
		$messageNumero = substr($messageDemande, $extractStart, $extractEnd-$extractStart);
		
		$allValues = explode(';', $messageNumero);
		$this->identifiant = $allValues[0];
		$this->nombreTirage = $allValues[1];
		$this->dateDebut = $allValues[2];
		$this->mysqli = $GLOBALS['mysqli'];
		
		$reqTitre = "SELECT titre FROM tcconditionmultiplicateur WHERE id=".$this->identifiant;
		$query = $this->mysqli->query($reqTitre);
		$res = $query->fetch_array();
		$this->titre = $res[0];
		}
	
	public function Hydrateur($listeDonnee)
		{
		if(isset($listeDonnee['id']))
			$this->identifiant = $listeDonnee['id'];
		else 
			$this->identifiant = '';
		$this->titre = $listeDonnee['titre'];
		$this->texteDescription = $listeDonnee['texteDescription'];
		}

	public function EnregistrerTechnique()
		{
		if($this->identifiant == '')
			{
			$req = "
			INSERT INTO  
				 tcconditionmultiplicateur
			VALUES (
				'', 
				'".$this->titre."', 
				'', 
				'', 
				'', 
				'', 
				'".addslashes($this->texteDescription)."')";
			}
		else
			{
			$req = "
			UPDATE 
				 tcconditionmultiplicateur
			SET 
				titre = '".$this->titre."', 
				conditionMultiplicateurFormatee = '', 
				avoirMultiplicateur = '', 
				typeMultiplicateur = '', 
				valeurMultiplicateur = '', 
				texteDescription = '".addslashes($this->texteDescription)."' 
			WHERE 
				id=".$this->identifiant;
			}

		// echo $req;
		$this->mysqli->query($req);
		if($this->identifiant == '')
			$this->identifiant = $this->mysqli->insert_id;
			
		if(!file_exists('class/TCMultiplicateur_'.$this->identifiant.'.class.php'))
			{
			$fichierTechnique = 'class/TCMultiplicateur_'.$this->identifiant.'.class.php';
			
			copy('class/TC_models/TCMultiplicateur_N.class.php', $fichierTechnique);
			

			//On complète le nom de la classe
			$fo = fopen($fichierTechnique, 'r') or die("Fichier manquant");
			$contenu = file_get_contents($fichierTechnique);
			$contenuMod = str_replace('[id]', $this->identifiant, $contenu);
			fclose($fo);

			$fo2 = fopen($fichierTechnique, 'w+') or die("Fichier manquant");
			fwrite($fo2, $contenuMod);
			fclose($fo2); 
			}
		}
	
	public function SupprimerTechnique()
		{
		if($this->identifiant != '')
			{
			$req = "DELETE FROM tcconditionmultiplicateur WHERE id=".$this->identifiant;
			$this->mysqli->query($req);
			
			if(file_exists('class/TCMultiplicateur_'.$this->identifiant.'.class.php'))
				unlink('class/TCMultiplicateur_'.$this->identifiant.'.class.php');
			}
		}
	
	public function RechercherTechnique($_idTechnique)
		{
		$req = "SELECT * FROM tcconditionmultiplicateur WHERE id=".$_idTechnique;
		$query = $this->mysqli->query($req);
		$data = $query->fetch_assoc();
		
		$this->Hydrateur($data);
		return $data;
		}
		
	public final function RechercherTitre()
		{
		return $this->titre;
		}
	}

abstract class TCConditionMultiplicateur_methods 
	{
	abstract public function RechercherAvoirMultiplicateur();
	abstract public function RechercherTypeMultiplicateur();
	abstract public function RechercherValeurMultiplicateur();
	abstract public function RechercherConditionsMultiplicateur();
	}
?>