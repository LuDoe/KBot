<?php
/**
 * 
 * Code skeleton generated by dia-uml2php5 plugin
 * written by KDO kdo@zpmag.com
 */

class Utilisateur_View 
	{
	/**
	 * 
	 * @var Facture
	 * @access private
	 */
	private  $model;

	/**
	 * 
	 * @var Facture_Controller
	 * @access private
	 */
	private  $controller;


	/**
	 * @access public
	 * @param Facture $model 
	 * @param Facture_Controller $controller 
	 * @return void
	 */

	public final  function __construct($_model, $_controller) 
		{
		$this->model = $_model;
		$this->controller = $_controller;
		}


	/**
	 * infos personnelles + cagnotte + récapitulatif des gains
	 * @access public
	 * @return html
	 */

	public final function Affichage()
		{
		$this->AfficherAccueilUtilisateur();
		}
	 
	public final  function AfficherAccueilUtilisateur() 
		{
		$data = '<p><a href="index.php?&model=utilisateur&action=AfficherInfoUtilisateur">Accueil '.$this->model->getLogin().'</a></p>';
		require_once($this->model->template);
		}


	/**
	 * @access public
	 * @param array $listeDonnee 
	 * @return html
	 */

	public final  function AfficherInfoUtilisateur() {
		// print('<pre>');
		// print_r($_GET);
		// print('</pre>');
		$data = '<p>Détail sur l\'utilisateur '.$this->model->getLogin().'</a></p>';
		$content = '<p>Toutes les infos clients</p>
					<table>
						<tr>
							<td>Login</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Login</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Login</td>
							<td>&nbsp;</td>
						</tr>
					</table>';
		$cagnotte = '<p>1000 &euro;</p>';
		require_once($this->model->template);
	}


	/**
	 * @access public
	 * @param Utilisateur $utilisateur 
	 * @return html
	 */

	public final  function FormulaireEditerUtilisateur(Utilisateur $utilisateur) {

	}


	/**
	 * @access public
	 * @return html
	 */

	public final  function FormulaireNouvelUtilisateur() {

	}


	/**
	 * @access public
	 * @return html
	 */

	public final  function FormulaireTypeUtilisateur() {

	}


}
?>