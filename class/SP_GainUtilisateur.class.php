<?php
/**
 * 
 * Code skeleton generated by dia-uml2php5 plugin
 * written by KDO kdo@zpmag.com
 */

class SP_GainUtilisateur {

	/**
	 * 
	 * @var Utilisateur
	 * @access private
	 */
	private  $utilisateur;

	/**
	 * 
	 * @var StatistiquePartie
	 * @access private
	 */
	private  $statistiquePartie;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private  $identifiantStrategie;

	/**
	 * privé, public, team, payante
	 * @var string
	 * @access private
	 */
	private  $typeStrategie;

	/**
	 * vainqueur / perdant selon la somme finale
	 * @var string
	 * @access private
	 */
	private  $resultatPartie;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private  $gainParStrategie;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private  $depensePourStrategie;

	/**
	 * euros
	 * @var float
	 * @access private
	 */
	private  $gainJeu;

	/**
	 * euros
	 * @var float
	 * @access private
	 */
	private  $depenseJeu;

	/**
	 * euros
	 * @var float
	 * @access private
	 */
	private  $sommeFinale;


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
	 * @return Utilisateur
	 */

	public final  function RechercherUtilisateur() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function RechercherIdStrategie() {

	}


	/**
	 * @access public
	 * @return string
	 */

	public final  function RechercherTypeStrategie() {

	}


	/**
	 * @access public
	 * @return string
	 */

	public final  function RechercherResultatPartie() {

	}


	/**
	 * credit
	 * @access public
	 * @return int
	 */

	public final  function RechercherDepenseStrategie() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function RechercherGainStrategie() {

	}


	/**
	 * @access public
	 * @return float
	 */

	public final  function RechercherDepenseJeu() {

	}


	/**
	 * euros
	 * @access public
	 * @return float
	 */

	public final  function RechercherGainJeu() {

	}


	/**
	 * @access public
	 * @return void
	 */

	public final  function CalculerTousElements() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function CalculerCoutStrategie() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function CalculerGainStrategie() {

	}


	/**
	 * @access public
	 * @return float
	 */

	public final  function CalculerCoutJeu() {

	}


	/**
	 * @access public
	 * @return float
	 */

	public final  function CalculerGainJeu() {

	}


	/**
	 * euros
	 * @access public
	 * @return float
	 */

	public final  function CalculerSommeFinale() {

	}


	/**
	 * @access public
	 * @return void
	 */

	public final  function DeductionResultatPartie() {

	}


}
?>