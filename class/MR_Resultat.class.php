<?php
/**
 * 
 * Code skeleton generated by dia-uml2php5 plugin
 * written by KDO kdo@zpmag.com
 */

class MR_Resultat {

	/**
	 * Réel / Simulé
	 * @var string
	 * @access private
	 */
	private  $typeJeu;

	/**
	 * Message de jeu à l'origine du message résultat
	 * @var int
	 * @access private
	 */
	private  $identifiantJeu;

	/**
	 * Résultat pour la proposition de jeu
	 * @var MJ_PropositionJeu
	 * @access private
	 */
	private  $propositionJeu;

	/**
	 * 
	 * @var int[]
	 * @access private
	 */
	private  $numerosTrouves;

	/**
	 * En euro (uniquement dépense de jeu)
	 * @var float
	 * @access private
	 */
	private  $depense;

	/**
	 * En Euro : gain de jeu
	 * @var float
	 * @access private
	 */
	private  $gain;


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
	 * @return string
	 */

	public final  function RechercherTypeJeu() {

	}


	/**
	 * @access public
	 * @return int
	 */

	public final  function RechercherIdentifiantJeu() {

	}


	/**
	 * @access public
	 * @return MJ_PropositionJeu
	 */

	public final  function RechercherPropositionJeu() {

	}


	/**
	 * @access public
	 * @return int[]
	 */

	public final  function RechercherNumerosTrouves() {

	}


	/**
	 * @access public
	 * @return float
	 */

	public final  function RechercherDepense() {

	}


	/**
	 * @access public
	 * @return float
	 */

	public final  function RechercherGain() {

	}


	/**
	 * @access public
	 * @param int $numeroTirage 
	 * @return void
	 */

	public final  function RenseignerMR_Resultat($numeroTirage) {

	}


	/**
	 * @access public
	 * @param int $numeroTrouve 
	 * @return void
	 */

	public final  function AjouterNumeroTrouve($numeroTrouve) {

	}


	/**
	 * @access public
	 * @param int $numero 
	 * @return void
	 */

	public final  function SupprimerNumeroTrouve($numero) {

	}


}
?>