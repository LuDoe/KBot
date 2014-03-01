<?php
class TCConditionNumero_View 
	{
	private $model;
	private $controller;
	private $mysqli;
	private $baseURL = 'index.php?model=tCConditionNumero';
	
	public final function __construct(TCConditionNumero $_model, TCConditionNumero_Controller $_controller) 
		{
		$this->model = $_model;
		$this->controller = $_controller;
		$this->mysqli = $GLOBALS['mysqli'];
		}
		
	public final function AfficherToutesTechniques()
		{
		$query = $this->controller->ListerTechnique();
		if($query->num_rows == 0)
			$contenuPrincipal = '<center>Il n\'y a pas de technique de numéro.</center>';
		else
			{
			$contenuPrincipal = '
			<table>
				<tr>
					<th>Titre</th>
					<th>Fichier de travail</th>
					<th>&nbsp;</th>
				</tr>';
			while($data = $query->fetch_assoc())
				{
				$contenuPrincipal .= '
				<tr>
					<td>
						<a href="'.$this->baseURL.'&action=AfficherInfosTechnique&id='.$data['id'].'">'.$data['titre'].'</a>
					</td>
					<td>TCNumero_'.$data['id'].'.class.php</td>
					<td>
						<a href="'.$this->baseURL.'&action=FormulaireEditerTechniqueNumero&id='.$data['id'].'">Editer</a><br/>
						<a href="'.$this->baseURL.'&action=SupprimerTechniqueNumero&id='.$data['id'].'">Supprimer</a>
					</td>
				</tr>
				';
				}
			$contenuPrincipal .= '</table>';
			}
		$moreInfo[0] = array();
		$moreInfo[0]['titre'] = 'Actions';
		$moreInfo[0]['contenu'] = '<a href="'.$this->baseURL.'&action=FormulaireAjouterTechniqueNumero">Ajouter une technique de numéro</a>';
		require_once($GLOBALS['template']);
		}
	
	public final function SupprimerTechniqueNumero()
		{
		$contenuPrincipal = '
		<center>Etes vous sûr de vouloir supprimer la technique '.$this->model->RechercherTitre().' ?</center><br/>
		<center>
			<input type="button" value="Oui" onClick="Javascript : window.location.href=\''.$this->baseURL.'&action=SupprimerTechnique&id='.$_GET['id'].'\'">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="Non" onClick="Javascript : window.location.href=\''.$this->baseURL.'&action=AfficherToutesTechniques\'">
		</center>
		';
		require_once($GLOBALS['template']);
		}
	
	public final function SupprimerTechnique()
		{
		$req = "SELECT * FROM tcconditionnumero WHERE id=".$_GET['id'];
		$query = $this->mysqli->query($req);
		$data = $query->fetch_assoc();
		$this->model->Hydrateur($data);
		
		$this->model->SupprimerTechniqueNumero();
		
		echo '<meta http-equiv="refresh" content="0;URL='.$this->baseURL.'&action=AfficherToutesTechniques">';
		exit();
		}
	
	public final function FormulaireAjouterTechniqueNumero()
		{		
		if(isset($_POST['valider_form']))
			{
			$error = $this->controller->VerifierInfo($_POST, true);
			
			if(!$error)
				{
				$this->model->Hydrateur($_POST);
				$this->model->EnregistrerTechniqueNumero();
				
				echo '<meta http-equiv="refresh" content="0;URL='.$this->baseURL.'&action=AfficherToutesTechniques">';
				exit();
				}
			else
				{
				$id = '';
				$titre = $_POST['titre'];
				$texteDescription = $_POST['texteDescription'];
				}
			}
		else
			{
			$error = '';
			$id = '';
			$titre = 'Technique ';
			$texteDescription = '';
			
			}
		
		$titrePage = "Ajouter une technique de numéro";
		$contenuPrincipal = '
		<ul>
			'.$error.'
		</ul>
		<form method="POST" action="'.$this->baseURL.'&action=FormulaireAjouterTechniqueNumero">
			<table>
				<tr>
					<td>Titre de la technique : </td>
					<td>
						<input type="text" name="titre" name="titre" value="'.$titre.'"/>
					</td>
				</tr>
				<tr>
					<td>Description de la technique : </td>
					<td>
						<textarea type="text" name="texteDescription" name="texteDescription">'.$texteDescription.'</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="button" name="annuler" value="Annuler" onClick="window.location.href=\''.$this->baseURL.'&action=AfficherToutesTechniques\';"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="valider_form" value="Enregistrer"/>
					</td>
				</tr>
			</table>
		</form>';
		require_once($GLOBALS['template']);
		}
	
	
	public final function FormulaireEditerTechniqueNumero()
		{
		if(isset($_POST['id']))
			$_idTechnique = $_POST['id'];
		else
			$_idTechnique = $_GET['id'];
		
		if(isset($_POST['valider_form']))
			{
			$error = $this->controller->VerifierInfo($_POST);
			
			if(!$error)
				{
				$this->model->Hydrateur($_POST);
				$this->model->EnregistrerTechniqueNumero();
				
				echo '<meta http-equiv="refresh" content="0;URL='.$this->baseURL.'&action=AfficherToutesTechniques">';
				exit();
				}
			else
				{
				$id = $_POST['id'];
				$titre = $_POST['titre'];
				$texteDescription = $_POST['texteDescription'];
				}
			}
		else
			{
			$data = $this->model->RechercherTechnique($_idTechnique);
			$error = '';
			$id = $data['id'];
			$titre = $data['titre'];
			$texteDescription = $data['texteDescription'];
			
			}
		
		$titrePage = "Détail de la technique de numéro : ".$this->model->RechercherTitre();
		$contenuPrincipal = '
		<ul>
			'.$error.'
		</ul>
		<form method="POST" action="'.$this->baseURL.'&action=FormulaireEditerTechniqueNumero">
			<input type="hidden" name="id" id="id" value="'.$id.'"/>
			<table>
				<tr>
					<td>Titre de la technique : </td>
					<td>
						<input type="text" name="titre" name="titre" value="'.$titre.'"/>
					</td>
				</tr>
				<tr>
					<td>Description de la technique : </td>
					<td>
						<textarea type="text" name="texteDescription" name="texteDescription">'.$texteDescription.'</textarea>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="button" name="annuler" value="Annuler" onClick="window.location.href=\''.$this->baseURL.'&action=AfficherToutesTechniques\';"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="valider_form" value="Enregistrer"/>
					</td>
				</tr>
			</table>
		</form>';
		require_once($GLOBALS['template']);
		}
		
	public final function AfficherInfosTechnique()
		{
		$data = $this->model->RechercherTechnique($_GET['id']);
		$contenuPrincipal = '
		<table>
			<tr>
				<td>Titre de la technique : </td>
				<td>
					<span>'.$data['titre'].'</span>
				</td>
			</tr>
			<tr>
				<td>Fichier de travail : </td>
				<td>
					<span>TCNumero_'.$data['id'].'.class.php</span>
				</td>
			</tr>
			<tr>
				<td>Description de la technique : </td>
				<td>
					<p>'.$data['texteDescription'].'"</p>
				</td>
			</tr>
		</table>';
		
		$moreInfo[0] = array();
		$moreInfo[0]['titre'] = 'Actions';
		$moreInfo[0]['contenu'] = 
		'<a href="'.$this->baseURL.'&action=FormulaireEditerTechniqueNumero&id='.$data['id'].'">Editer</a><br/>
		<a href="'.$this->baseURL.'&action=SupprimerTechniqueNumero&id='.$data['id'].'">Supprimer</a>';
								
		require_once($GLOBALS['template']);
		}
	}
?>