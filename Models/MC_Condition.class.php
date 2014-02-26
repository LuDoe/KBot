<?php
/**
 * 
 * Code skeleton generated by dia-uml2php5 plugin
 * written by KDO kdo@zpmag.com
 * @see        MC_Conditions
 */
require_once('MC_Conditions.class.php');

class MC_Condition extends MC_Conditions {

	/**
	 * 
	 * @var MC_ConditionValeur
	 * @access private
	 */
	private  $valeurTestee;

	/**
	 * 
	 * @var MC_ConditionValeur
	 * @access private
	 */
	private  $valeurComparee;

	/**
	 * 
	 * @var MC_ConditionComparateur
	 * @access private
	 */
	private  $comparateur;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private  $description;


	/**
	 * @access public
	 * @param string $conditionStrategie 
	 * @return void
	 */

	public final  function __construct($conditionStrategie = "") {
	//ERROR: METHOD CAN'T BE OVERLOADED, PARENT HAS DECLARED IT 'final'!
	}


	/**
	 * @access public
	 * @param MC_ConditionValeur $valeur1 
	 * @param MC_ConditionValeur $valeur2 
	 * @return bool
	 */

	public final  function VerifierValeursComparables(MC_ConditionValeur $valeur1, MC_ConditionValeur $valeur2) {

	}


	/**
	 * @access public
	 * @return bool
	 */

	public final  function CalculerCondition() {

	}


	/**
	 * @access public
	 * @return string
	 */

	public final  function RenvoyerDescription() {

	}


	/**
	 * @access public
	 * @return MC_ConditionValeur
	 */

	public final  function RechercherValeurTestee() {

	}


	/**
	 * @access public
	 * @return MC_ConditionValeur
	 */

	public final  function RechercherValeurComparee() {

	}


	/**
	 * @access public
	 * @return MC_ConditionComparateur
	 */

	public final  function RechercherComparateur() {

	}


	/**
	 * @access public
	 * @return string
	 */

	public final  function RechercherTexteComparaison() {

	}


	/**
	 * @access public
	 * @param MC_ConditionValeur $nouvelleValeur 
	 * @return void
	 */

	public final  function ChangerValeurTestee(MC_ConditionValeur $nouvelleValeur) {

	}


	/**
	 * @access public
	 * @param MC_ConditionValeur $nouvelleValeur 
	 * @return void
	 */

	public final  function ChangerValeurComparee(MC_ConditionValeur $nouvelleValeur) {

	}


	/**
	 * @access public
	 * @param MC_ConditionComparateur $nouveauComparateur 
	 * @return void
	 */

	public final  function ChangerComparateur(MC_ConditionComparateur $nouveauComparateur) {

	}


	/**
	 * @access public
	 * @return void
	 */

	public final  function EnregistrerCondition() {

	}


}
?>