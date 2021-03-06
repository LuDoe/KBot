<?php
/**
 * 
 * Code skeleton generated by dia-uml2php5 plugin
 * written by KDO kdo@zpmag.com
 */

class Team {

	/**
	 * 
	 * @var string
	 * @access public
	 */
	public  $titre;

	/**
	 * 
	 * @var int
	 * @access public
	 */
	public  $chefTeam;

	/**
	 * 
	 * @var int
	 * @access public
	 */
	public  $objectifFinancier;

	/**
	 * 
	 * @var Joueur[]
	 * @access public
	 */
	public  $listeJoueur;

	/**
	 * 
	 * @var int
	 * @access public
	 */
	public  $sommeCagnotteJeu;

	/**
	 * 
	 * @var Commentaire[]
	 * @access public
	 */
	public  $listeCommentaire;

	/**
	 * 
	 * @var Abonnement
	 * @access public
	 */
	public  $abonnement;


	/**
	 * @access public
	 * @param array $listeDonnee 
	 * @return void
	 */

	public final  function __construct($listeDonnee = false) {

	}


	/**
	 * @access public
	 * @param array $listeDonnee 
	 * @return void
	 */

	public final  function Hydrateur($listeDonnee) {

	}


	/**
	 * @access public
	 * @return Joueur[]
	 */

	public final  function RechercherMembre() {

	}


	/**
	 * @access public
	 * @return resultat[Joueur][technique][gain]
	 */

	public final  function RechercherResultatMembres() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function RechercherObjectifFinancier() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function RechercherSommeCagnotte() {

	}


	/**
	 * @access public
	 * @return Commentaire[]
	 */

	public final  function RechercherCommentaire() {

	}


	/**
	 * @access public
	 * @return string
	 */

	public final  function RechercherAbonnement() {

	}


}
?>