<?php

class TableauDesGains 
	{
	public $template = 'tpl/template.php';
	private $identifiant;
	private $nombreJoue;
	private $nombreTrouve;
	private $mise;
	private $gain;
	private $aVie;
	private $chanceGain;
	private $depense;
	private $mysqli;
	
	public final  function __construct($_quantiteNumero = 2, $_mise = 1) 
		{
		$this->mysqli = $GLOBALS['mysqli'];
		$req = "SELECT * FROM tableaudesgains WHERE nombreJoue='".$_quantiteNumero."' AND mise='".$_mise."'";
		$query = $this->mysqli->query($req);
		$data = $query->fetch_assoc();
		
		$this->Hydrateur($data);
		}

	public final  function Hydrateur($listeDonnee) 
		{
		$this->identifiant = $listeDonnee['id'];
		$this->nombreJoue = $listeDonnee['nombreJoue'];
		$this->nombreTrouve = $listeDonnee['nombreTrouve'];
		$this->mise = $listeDonnee['mise'];
		$this->gain = $listeDonnee['gain'];
		$this->aVie = $listeDonnee['aVie'];
		$this->chanceGain = $listeDonnee['chanceGain'];
		$this->depense = $listeDonnee['depense'];
		}

	public final function EnregistrerLigne()
		{
		if($this->identifiant == '')
			{
			$req = "
			INSERT INTO  
				tableaudesgains
			VALUES (
				'', 
				'".$this->nombreJoue."', 
				'".$this->nombreTrouve."', 
				'".$this->mise."', 
				'".$this->gain."', 
				'".$this->aVie."', 
				'".$this->chanceGain."', 
				'".$this->depense."')";
			}
		else
			{
			$req = "
			UPDATE 
				tableaudesgains
			SET 
				nombreJoue = '".$this->nombreJoue."', 
				nombreTrouve = '".$this->nombreTrouve."', 
				mise = '".$this->mise."', 
				gain = '".$this->gain."', 
				aVie = '".$this->aVie."', 
				chanceGain = '".$this->chanceGain."', 
				depense = '".$this->depense."' 
			WHERE 
				id=".$this->identifiant;
			}
		
		// echo $req;
		$this->mysqli->query($req);
		}
		
	public final  function RenvoyerGain($nombreJ) 
		{
		
		}

	public final  function RenvoyerDepense() 
		{
		
		}
		
	public final function RechercherLigneGain($_idLigne)
		{
		$req = "SELECT * FROM tableaudesgains WHERE id=".$_idLigne;
		$query = $this->mysqli->query($req);
		$data = $query->fetch_assoc();
		
		$this->Hydrateur($data);
		return $data;
		}
	}
?>