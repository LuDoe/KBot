<?php
/**
 * 
 * Code skeleton generated by dia-uml2php5 plugin
 * written by KDO kdo@zpmag.com
 */

class JeuEnCours {

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private  $identifiant;

	/**
	 * 
	 * @var Strategie
	 * @access private
	 */
	private  $strategie;

	/**
	 * 
	 * @var MessageJeu
	 * @access private
	 */
	private  $messageJeu;

	/**
	 * 
	 * @var MessageResultat
	 * @access private
	 */
	private  $messageResultat;

	/**
	 * 
	 * @var datetime
	 * @access private
	 */
	private  $dateJeu;

	/**
	 * 
	 * @var bool
	 * @access private
	 */
	private  $jeuSaisieManuelle;

	/**
	 * 
	 * @var bool
	 * @access private
	 */
	private  $avoirRecus;

	/**
	 * 
	 * @var CalculStatistique
	 * @access private
	 */
	private  $statistique;


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
	 * @param MessageJeu $messageJeu 
	 * @return void
	 */

	public final  function ObservateurJeu(MessageJeu $messageJeu) {

	}


	/**
	 * @access public
	 * @return datetime
	 */

	public final  function RechercherDateJeu() {

	}


	/**
	 * @access public
	 * @return StrategieUtilisateur
	 */

	public final  function RechercherStrategie() {

	}


	/**
	 * @access public
	 * @return CalculStatistique
	 */

	public final  function RechercherStatistique() {

	}


	/**
	 * @access public
	 * @return MessageJeu[]
	 */

	public final  function RechercherMessageJeu() {

	}


	/**
	 * @access public
	 * @return MessageResultat[]
	 */

	public final  function RechercherMessageResultat() {

	}


	/**
	 * @access public
	 * @return bool
	 */

	public final  function RechercherSiJeuManuel() {

	}


	/**
	 * @access public
	 * @return bool
	 */

	public final  function RechercherAvoirRecu() {

	}


}
?>