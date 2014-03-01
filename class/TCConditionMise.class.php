<?php
class TCConditionMise 
	{
	private $identifiant;
	private $dateDebut;
	private $nombreTirage;
	private $titre;
	private $conditionMiseFormatee;
	private $typeMise;
	private $valeurFixe;
	private $valeurSupplementaire;
 	private $texteDescription;
	private $mysqli;

	public final  function __construct($messageDemande = false) 
		{
		// MISE[id:nbr_tirage;date_debut;ARG_1;ARG_N]
		if(!$messageDemande)
			$messageDemande = 'MISE[1;0;2009-01-01;ARG_1;ARG_N]';
		$extractStart = strpos($messageDemande, 'MISE[')+5;
		$extractEnd = strpos($messageDemande, ']', $extractStart);
		$messageNumero = substr($messageDemande, $extractStart, $extractEnd-$extractStart);
		
		$allValues = explode(';', $messageNumero);
		$this->identifiant = $allValues[0];
		$this->nombreTirage = $allValues[1];
		$this->dateDebut = $allValues[2];
		$this->mysqli = $GLOBALS['mysqli'];
		
		$reqTitre = "SELECT titre FROM tcconditionmise WHERE id=".$this->identifiant;
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
				 tcconditionmise
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
				 tcconditionmise
			SET 
				titre = '".$this->titre."', 
				conditionMiseFormatee = '', 
				typeMise = '', 
				valeurFixe = '', 
				valeurSupplementaire = '', 
				texteDescription = '".addslashes($this->texteDescription)."' 
			WHERE 
				id=".$this->identifiant;
			}

		// echo $req;
		$this->mysqli->query($req);
		if($this->identifiant == '')
			$this->identifiant = $this->mysqli->insert_id;
			
		if(!file_exists('class/TCMise_'.$this->identifiant.'.class.php'))
			{
			$fichierTechnique = 'class/TCMise_'.$this->identifiant.'.class.php';
			
			copy('class/TC_models/TCMise_N.class.php', $fichierTechnique);
			

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
			$req = "DELETE FROM tcconditionmise WHERE id=".$this->identifiant;
			$this->mysqli->query($req);
			
			if(file_exists('class/TCMise_'.$this->identifiant.'.class.php'))
				unlink('class/TCMise_'.$this->identifiant.'.class.php');
			}
		}
	
	public function RechercherTechnique($_idTechnique)
		{
		$req = "SELECT * FROM tcconditionmise WHERE id=".$_idTechnique;
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
	
abstract class TCConditionMise_methods
	{
	abstract public function RechercherTypeMise();
	abstract public function RechercherValeurFixe();
	abstract public function RechercherValeurSupplémentaire();
	}
?>