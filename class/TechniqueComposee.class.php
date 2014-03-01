<?php

class TechniqueComposee 
	{
	public $template = 'tpl/template.php';
	private $mysqli; 
	
	private  $identifiant;
	private  $nom;
	private  $variante;
	private  $version;
	private  $etrePeriodeMorte;
	private  $niveau;
	private  $jeuNumero;
	private  $jeuGrille;
	private  $jeuPeriode;
	private  $jeuMise;
	private  $jeuMultiplicateur;
	
	public final  function __construct($listeDonnee = false) 
		{
		$this->mysqli = $GLOBALS['mysqli'];
		if($listeDonnee)
			Hydrateur($listeDonnee);
		}
	
	public final  function Hydrateur($listeDonnee) 
		{
		if(isset($listeDonnee['id']))
			$this->identifiant = $listeDonnee['id'];
		else
			$this->identifiant = '';
			
		$this->nom = $listeDonnee['nom'];
		$this->variante = $listeDonnee['variante'];
		$this->version = $listeDonnee['version'];
		$this->niveau = $listeDonnee['niveau'];
		$this->jeuNumero = $listeDonnee['jeuNumero'];
		$this->jeuGrille = $listeDonnee['jeuGrille'];
		$this->jeuPeriode = $listeDonnee['jeuPeriode'];
		$this->jeuMise = $listeDonnee['jeuMise'];
		$this->jeuMultiplicateur = $listeDonnee['jeuMultiplicateur'];
		}
	
	public final function RechercherInformationTechnique($_idTechnique) 
		{
		$req = "SELECT * FROM techniquecomposee WHERE id=".$_idTechnique;
		$query = $this->mysqli->query($req);
		$data = $query->fetch_assoc();
		
		$this->Hydrateur($data);
		return $data;
		}

	public final function EnregistrerTechnique()
		{
		if($this->identifiant == '')
			{
			$req = "
			INSERT INTO  
				techniquecomposee
			VALUES (
				'', 
				'".$this->nom."', 
				'".$this->variante."', 
				'".$this->version."', 
				'".$this->etrePeriodeMorte."', 
				'".$this->niveau."', 
				'".$this->jeuNumero."', 
				'".$this->jeuGrille."',
				'".$this->jeuPeriode."',
				'".$this->jeuMise."',
				'".$this->jeuMultiplicateur."')";
			}
		else
			{
			$req = "
			UPDATE 
				techniquecomposee
			SET 
				nom = '".$this->nom."', 
				variante = '".$this->variante."', 
				version = '".$this->version."', 
				etrePeriodeMorte = '".$this->etrePeriodeMorte."', 
				niveau = '".$this->niveau."', 
				jeuNumero = '".$this->jeuNumero."', 
				jeuGrille = '".$this->jeuGrille."', 
				jeuPeriode = '".$this->jeuPeriode."', 
				jeuMise = '".$this->jeuMise."', 
				jeuMultiplicateur = '".$this->jeuMultiplicateur."' 
			WHERE 
				id=".$this->identifiant;
			}
		
		// echo $req;
		$this->mysqli->query($req);
		}
	
	public final function SupprimerTechnique()
		{
		if($this->identifiant != '')
			{
			$req = "DELETE FROM techniquecomposee WHERE id=".$this->identifiant;
			$this->mysqli->query($req);
			}
		}
	
	public final function RechercherNom()
		{
		return $this->nom;
		}
		
	public final  function RechercherMessageDemande() 
		{
		}

	public final  function RechercherTiragePasse() 
		{
		}

	public final  function RechercherTirageJouee() 
		{
		}

	public final  function RechercherDateDebut() 
		{
		}

	public final  function RechercherEtatPeriodeMorte() 
		{
		}

	public final  function RechercherNombreGrilleJouee() 
		{
		}

	public final  function RchercherAutorisationJeu() 
		{
		}

	public final  function DecomposerMessageDemande() 
		{
		}

	public final  function ComposerMessageJeu() 
		{
		}
	}
?>