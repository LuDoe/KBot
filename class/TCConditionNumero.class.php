<?php

class TCConditionNumero 
	{
	private $identifiant;
	private $titre;
	private $dateDebut;
	private $nombreTirage;
	private $nombreNumero;
	private $listeNumero;
	private $listeNumeroFormatee;
	private $texteDescription;
	private $mysqli;
	
	public function __construct($messageDemande = false) 
		{
		// NUMERO[id:nbr_tirage;date_debut;nombre de numéro;ARG_1;ARG_N]
		if(!$messageDemande)
			$messageDemande = 'NUMERO[1;0;2009-01-01;2;ARG_1;ARG_N]';
		$extractStart = strpos($messageDemande, 'NUMERO[')+7;
		$extractEnd = strpos($messageDemande, ']', $extractStart);
		$messageNumero = substr($messageDemande, $extractStart, $extractEnd-$extractStart);
		
		$allValues = explode(';', $messageNumero);
		$this->identifiant = $allValues[0];
		$this->nombreTirage = $allValues[1];
		$this->dateDebut = $allValues[2];
		$this->nombreNumero = $allValues[3];
		$this->mysqli = $GLOBALS['mysqli'];
		
		$reqTitre = "SELECT titre FROM tcconditionnumero WHERE id=".$this->identifiant;
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
	
	public function EnregistrerTechniqueNumero()
		{
		if($this->identifiant == '')
			{
			$req = "
			INSERT INTO  
				 tcconditionnumero
			VALUES (
				'', 
				'".$this->titre."', 
				'', 
				'', 
				'".addslashes($this->texteDescription)."')";
			}
		else
			{
			$req = "
			UPDATE 
				 tcconditionnumero
			SET 
				titre = '".$this->titre."', 
				listeNumero = '', 
				listeNumeroFormatee = '', 
				texteDescription = '".addslashes($this->texteDescription)."' 
			WHERE 
				id=".$this->identifiant;
			}
		
		// echo $req;
		$this->mysqli->query($req);
		if($this->identifiant == '')
			$this->identifiant = $this->mysqli->insert_id;
			
		if(!file_exists('class/TCNumero_'.$this->identifiant.'.class.php'))
			{
			$fichierTechnique = 'class/TCNumero_'.$this->identifiant.'.class.php';
			
			copy('class/TC_models/TCNumero_N.class.php', $fichierTechnique);
			

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
	
	public function SupprimerTechniqueNumero()
		{
		if($this->identifiant != '')
			{
			$req = "DELETE FROM tcconditionnumero WHERE id=".$this->identifiant;
			$this->mysqli->query($req);
			
			if(file_exists('class/TCNumero_'.$this->identifiant.'.class.php'))
				unlink('class/TCNumero_'.$this->identifiant.'.class.php');
			}
		}
		
	public function RechercherTechnique($_idTechnique)
		{
		$req = "SELECT * FROM tcconditionnumero WHERE id=".$_idTechnique;
		$query = $this->mysqli->query($req);
		$data = $query->fetch_assoc();
		
		$this->Hydrateur($data);
		return $data;
		}
	
	public function RechercherTitre()
		{
		return $this->titre;
		}
	}
	
abstract class TCConditionNumero_methods 
	{
	abstract public function RechercherListeNumero();
	abstract public function RechercherListeNumeroFormatee();
	abstract public function RechercherTexteDescription();
	}
?>