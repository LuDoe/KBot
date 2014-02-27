<?php
class Tirage 
	{
	public $template = 'tpl/template.php';
	private $identifiant;
	private $numeroTirage;
	private $dateJeu;
	private $listeNumeroSorti;
	private $valeurMultiplicateur;
	private $observateurTirage;
	private $momentTirage;
	private $dateForclusion;
	private $numeroJackpot;
	private $montantJackpot;
	private $numeroJokerplus;
	private $devis;
	private $mysqli;

	public final  function __construct($listeDonnee = false) 
		{
		$this->template = 'tpl/template.php';
		$this->mysqli = $GLOBALS['mysqli'];
		}


	/**
	 * @access public
	 * @param array $listeDonnee 
	 * @return void
	 */

	public final  function Hydrateur($listeDonnee) 
		{
		$this->identifiant = $listeDonnee['id'];
		$this->numeroTirage = $listeDonnee['numeroTirage'];
		$this->dateJeu = $listeDonnee['dateJeu'];
		$this->listeNumeroSorti = $listeDonnee['listeNumeroSorti'];
		$this->valeurMultiplicateur = $listeDonnee['valeurMultiplicateur'];
		$this->momentTirage = $listeDonnee['momentTirage'];
		$this->dateForclusion = $listeDonnee['dateForclusion'];
		$this->numeroJackpot = $listeDonnee['numeroJackpot'];
		$this->montantJackpot = $listeDonnee['montantJackpot'];
		$this->numeroJokerplus = $listeDonnee['numeroJokerplus'];
		
		if(isset($listeDonnee['devise']))
			$this->devise = $listeDonnee['devise'];
		else
			$this->devise = 'euro';
		
		if(isset($listeDonnee['observateurTirage']))
			$this->observateurTirage = $listeDonnee['observateurTirage'];
		else
			$this->observateurTirage = '';
		}

	public final function EnregistrerTirage()
		{
		if($this->identifiant == '')
			{
			$req = "
			INSERT INTO  
				tirage
			VALUES (
				'', 
				'".$this->numeroTirage."', 
				'".$this->dateJeu."', 
				'".$this->listeNumeroSorti."', 
				'".$this->valeurMultiplicateur."', 
				'".$this->momentTirage."', 
				'".$this->dateForclusion."', 
				'".$this->numeroJackpot."', 
				'".$this->montantJackpot."', 
				'".$this->numeroJokerplus."', 
				'".$this->devise."', 
				'".$this->observateurTirage."')";
			}
		else
			{
			$req = "
			UPDATE 
				tirage
			SET 
				numeroTirage = '".$this->numeroTirage."', 
				dateJeu = '".$this->dateJeu."', 
				listeNumeroSorti = '".$this->listeNumeroSorti."', 
				valeurMultiplicateur = '".$this->valeurMultiplicateur."', 
				momentTirage = '".$this->momentTirage."', 
				dateForclusion = '".$this->dateForclusion."', 
				numeroJackpot = '".$this->numeroJackpot."', 
				montantJackpot = '".$this->montantJackpot."', 
				numeroJokerplus = '".$this->numeroJokerplus."', 
				devise = '".$this->devise."', 
				observateurTirage = '".$this->observateurTirage."' 
			WHERE 
				id=".$this->identifiant;
			}
		
		// echo $req;
		$this->mysqli->query($req);
		}
		
	public final  function RechercherInfoTirage($_idTirage) 
		{
		$req = "SELECT * FROM tirage WHERE id=".$_idTirage;
		$query = $this->mysqli->query($req);
		$data = $query->fetch_assoc();
		
		$this->Hydrateur($data);
		return $data;
		}


	/**
	 * @access public
	 * @return int
	 */

	public final  function RechercherNumeroTirage() {

	}


	/**
	 * @access public
	 * @return datetime
	 */

	public final  function RechercherDateJeu() {

	}


	/**
	 * @access public
	 * @return int[]
	 */

	public final  function RechercherNumerosSortis() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function RechercherMultiplicateur() {

	}


	/**
	 * @access public
	 * @return Jeu
	 */

	public final  function RechercherObservateur() {

	}


	/**
	 * @access public
	 * @return string
	 */

	public final  function RechercherMomentTirage() {

	}


	/**
	 * @access public
	 * @return date
	 */

	public final  function RechercherDateForclusion() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function RechercherJackpot() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function RechercherJokerplus() {

	}


	/**
	 * @access public
	 * @return string
	 */

	public final  function RechercherDevise() {

	}


}
?>