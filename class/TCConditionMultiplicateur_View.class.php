<?php
class TCConditionMultiplicateur_View 
	{
	private $model;
	private $controller;
	private $mysqli;
	private $baseURL = 'index.php?model=TCConditionMultiplicateur';
	
	public final function __construct(TCConditionMultiplicateur $_model, TCConditionMultiplicateur_Controller $_controller) 
		{
		$this->model = $_model;
		$this->controller = $_controller;
		$this->mysqli = $GLOBALS['mysqli'];
		}
		
	public final function AfficherToutesTechniques()
		{
		$query = $this->controller->ListerTechnique();
		if($query->num_rows == 0)
			$contenuPrincipal = '<center>Il n\'y a pas de technique de période.</center>';
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
					<td>TCMultiplicateur_'.$data['id'].'.class.php</td>
					<td>
						<a href="'.$this->baseURL.'&action=FormulaireEditerTechnique&id='.$data['id'].'">Editer</a><br/>
						<a href="'.$this->baseURL.'&action=ConfirmerSupprimerTechnique&id='.$data['id'].'">Supprimer</a>
					</td>
				</tr>
				';
				}
			$contenuPrincipal .= '</table>';
			}
		$moreInfo[0] = array();
		$moreInfo[0]['titre'] = 'Actions';
		$moreInfo[0]['contenu'] = '<a href="'.$this->baseURL.'&action=FormulaireAjouterTechnique">Ajouter une technique de multiplicateur</a>';
		require_once($GLOBALS['template']);
		}
	
	public final function ConfirmerSupprimerTechnique()
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
		$req = "SELECT * FROM tcconditionmultiplicateur WHERE id=".$_GET['id'];
		$query = $this->mysqli->query($req);
		$data = $query->fetch_assoc();
		$this->model->Hydrateur($data);
		
		$this->model->SupprimerTechnique();
		
		echo '<meta http-equiv="refresh" content="0;URL='.$this->baseURL.'&action=AfficherToutesTechniques">';
		exit();
		}
	
	public final function FormulaireAjouterTechnique()
		{		
		if(isset($_POST['valider_form']))
			{
			$error = $this->controller->VerifierInfo($_POST, true);
			
			if(!$error)
				{
				$this->model->Hydrateur($_POST);
				$this->model->EnregistrerTechnique();
				
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
		
		$titrePage = "Ajouter une technique de multiplicateur";
		$contenuPrincipal = '
		<ul>
			'.$error.'
		</ul>
		<form method="POST" action="'.$this->baseURL.'&action=FormulaireAjouterTechnique">
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
	
	
	public final function FormulaireEditerTechnique()
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
				$this->model->EnregistrerTechnique();
				
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
		
		$titrePage = "Détail de la technique de période : ".$this->model->RechercherTitre();
		$contenuPrincipal = '
		<ul>
			'.$error.'
		</ul>
		<form method="POST" action="'.$this->baseURL.'&action=FormulaireEditerTechnique">
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
					<span>TCMultiplicateur_'.$data['id'].'.class.php</span>
				</td>
			</tr>
			<tr>
				<td>Description de la technique : </td>
				<td>
					<p>'.$data['texteDescription'].'</p>
				</td>
			</tr>
		</table>';
		
		$moreInfo[0] = array();
		$moreInfo[0]['titre'] = 'Actions';
		$moreInfo[0]['contenu'] = 
		'<a href="'.$this->baseURL.'&action=FormulaireEditerTechnique&id='.$data['id'].'">Editer</a><br/>
		<a href="'.$this->baseURL.'&action=ConfirmerSupprimerTechnique&id='.$data['id'].'">Supprimer</a>';
								
		require_once($GLOBALS['template']);
		}
	}
?>