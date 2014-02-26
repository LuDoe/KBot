<?php
/**
 * 
 * Code skeleton generated by dia-uml2php5 plugin
 * written by KDO kdo@zpmag.com
 */

class MC_ConditionComparateur {

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private  $identifiant;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private  $identifiantCondition;

	/**
	 * exemple math.>= heure.>=
	 * @var string
	 * @access private
	 */
	private  $typeComparateur;

	/**
	 * =, >=, in, interval(?)
	 * @var string
	 * @access private
	 */
	private  $comparateurType;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private  $titre;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private  $description;


	/**
	 * @access public
	 * @param string $comparateurTexte 
	 * @param MC_ConditionValeur $valeurComparee 
	 * @param MC_ConditionValeur $valeurTestee 
	 * @return void
	 */

	public final  function __construct($comparateurTexte = false, MC_ConditionValeur $valeurComparee, MC_ConditionValeur $valeurTestee) {

	}


	/**
	 * @access public
	 * @return string
	 */

	public final  function RenvoyerDescription() {

	}


	/**
	 * @access public
	 * @return bool
	 */

	public final  function VérifierComparaison() {

	}


	/**
	 * @access public
	 * @return bool
	 */

	public final  function RechercherResultatComparaison() {

	}


	/**
	 * @access public
	 * @param MC_ConditionValeur $valeurTestee 
	 * @return array
	 */

	public final  function RechercherListeComparateur(MC_ConditionValeur $valeurTestee) {

	}


	/**
	 * @access public
	 * @return void
	 */

	public final  function EnregistrerComparateur() {

	}


	/**
	 * @access public
	 * @param string $nouveauTitre 
	 * @return void
	 */

	public final  function ChangerTitre($nouveauTitre) {

	}


	/**
	 * @access public
	 * @param string $nouvelleDescription 
	 * @return void
	 */

	public final  function ChangerDescription($nouvelleDescription) {

	}


	/**
	 * @access public
	 * @return html
	 */

	public final  function FormulaireComparateur() {

	}


}
?>