<?php
class TCConditionGrille 
	{
	private $identifiant;
	private $dateDebut;
	private $nombreTirage;
	private $titre;
	private $grilleJeuFormatee;
	private $nombreGrille;
	private $typeGrille;
	private $valeurGrille;
	private $texteDescription;
	private $mysqli;
	

	public function __construct($messageDemande = false)
		{
		// GRILLE[id:nbr_tirage;date_debut;ARG_1;ARG_N]
		if(!$messageDemande)
			$messageDemande = 'GRILLE[1;0;2009-01-01;ARG_1;ARG_N]';
		$extractStart = strpos($messageDemande, 'GRILLE[')+7;
		$extractEnd = strpos($messageDemande, ']', $extractStart);
		$messageNumero = substr($messageDemande, $extractStart, $extractEnd-$extractStart);
		
		$allValues = explode(';', $messageNumero);
		$this->identifiant = $allValues[0];
		$this->nombreTirage = $allValues[1];
		$this->dateDebut = $allValues[2];
		$this->mysqli = $GLOBALS['mysqli'];
		
		$reqTitre = "SELECT titre FROM tcconditiongrille WHERE id=".$this->identifiant;
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
				 tcconditiongrille
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
				 tcconditiongrille
			SET 
				titre = '".$this->titre."', 
				grilleJeuFormatee = '', 
				nombreGrille = '', 
				typeGrille = '', 
				valeurGrille = '', 
				texteDescription = '".addslashes($this->texteDescription)."' 
			WHERE 
				id=".$this->identifiant;
			}

		// echo $req;
		$this->mysqli->query($req);
		if($this->identifiant == '')
			$this->identifiant = $this->mysqli->insert_id;
			
		if(!file_exists('class/TCGrille_'.$this->identifiant.'.class.php'))
			{
			$fichierTechnique = 'class/TCGrille_'.$this->identifiant.'.class.php';
			
			copy('class/TC_models/TCGrille_N.class.php', $fichierTechnique);
			

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
			$req = "DELETE FROM tcconditiongrille WHERE id=".$this->identifiant;
			$this->mysqli->query($req);
			
			if(file_exists('class/TCGrille_'.$this->identifiant.'.class.php'))
				unlink('class/TCGrille_'.$this->identifiant.'.class.php');
			}
		}
	
	public function RechercherTechnique($_idTechnique)
		{
		$req = "SELECT * FROM tcconditiongrille WHERE id=".$_idTechnique;
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

abstract class TCConditionGrille_Methods
	{
	abstract public function RechercherNombreGrille();
	abstract public function RechercherTypeGrille();
	abstract public function RechercherValeurGrille();
	}
?>