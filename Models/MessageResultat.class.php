<?php
/**
 * 
 * Code skeleton generated by dia-uml2php5 plugin
 * written by KDO kdo@zpmag.com
 * @see        Messages
 */
require_once('Messages.class.php');

class MessageResultat extends Messages {

	/**
	 * 
	 * @var datetime
	 * @access private
	 */
	private  $dateTirage;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private  $numeroTirage;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private  $periodeJeu;

	/**
	 * 
	 * @var int[]
	 * @access private
	 */
	private  $numerosSorties;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private  $multiplicateur;

	/**
	 * 
	 * @var MR_Resultat[]
	 * @access private
	 */
	private  $listeResultat;

	/**
	 * en euro
	 * @var float
	 * @access private
	 */
	private  $depenseTotale;

	/**
	 * en Euro
	 * @var float
	 * @access private
	 */
	private  $gainTotal;


	/**
	 * @access public
	 * @param string $messageResultat 
	 * @return void
	 */

	public final  function __construct($messageResultat = false) {
	//ERROR: METHOD CAN'T BE OVERLOADED, PARENT HAS DECLARED IT 'final'!
	}


	/**
	 * @access public
	 * @param string $messageDonne 
	 * @return void
	 */

	public final  function Hydrateur($messageDonne) {
	//ERROR: METHOD CAN'T BE OVERLOADED, PARENT HAS DECLARED IT 'final'!
	}


	/**
	 * @access public
	 * @return datetime
	 */

	public final  function RechercherDateTirage() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function RechercherNumeroTirage() {

	}


	/**
	 * @access public
	 * @return int[]
	 */

	public final  function RechercherNumerosSorties() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function RechercherMultiplicateur() {

	}


	/**
	 * @access public
	 * @return MR_Resultat[]
	 */

	public final  function RechercherListeResultat() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function RechercherPeriode() {

	}


	/**
	 * en Euro
	 * @access public
	 * @return float
	 */

	public final  function CalculerGainTotal() {

	}


	/**
	 * En Euro
	 * @access public
	 * @return float
	 */

	public final  function CalculerDepenseTotale() {

	}


	/**
	 * 1 Période = 40 parties
	 * @access public
	 * @return int
	 */

	public final  function CalculerPeriode() {

	}


	/**
	 * @access public
	 * @param MR_Resultat $messageResultat 
	 * @return void
	 */

	public final  function AjouterMessageResultat(MR_Resultat $messageResultat) {

	}


	/**
	 * @access public
	 * @param MR_Resultat[] $listeMessageResultat 
	 * @return void
	 */

	public final  function AjouterListeMessageResultat(MR_Resultat[] $listeMessageResultat) {

	}


	/**
	 * @access public
	 * @param MessageResultat $messageResultat 
	 * @return void
	 */

	public final  function ChangerMessageResultat(MessageResultat $messageResultat) {

	}


	/**
	 * @access public
	 * @param MR_Resultat $resultat 
	 * @return void
	 */

	public final  function SupprimerResultat(MR_Resultat $resultat) {

	}


}
?>