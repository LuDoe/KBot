<?php
/*
AfficherTousTirage
AfficherTirage
FormulaireEditionTirage
FormulaireNouveauTirage
*/

class Tirage_View 
	{
	private  $model;
	private  $controller;

	public final  function __construct(Tirage $_model, Tirage_Controller $_controller) 
		{
		$this->model = $_model;
		$this->controller = $_controller;
		}

	public final  function AfficherTousTirage() 
		{
		if(empty($_GET['page']))
			$page = 0;
		else
			$page = $_GET['page'];
			
		$titrePage = "Tous les tirages";
		$query = $this->controller->RechecherTousTirages($page);
		
		$contenuPrincipal = '<table>
			<tr>
				<th>Numéro du tirage</th>
				<th>Date du tirage</th>
				<th>Moment</th>
				<th>Numéros</th>
				<th>Multiplicateur</th>
				<th>&nbsp;</th>
			</tr>';
		while($data = $query->fetch_array())
			{
			$contenuPrincipal .= '
			<tr>
				<td>
					<a href="index.php?model=tirage&action=AfficherTirage&id='.$data[0].'">'.$data[1].'</a>
				</td>
				<td>'.$data[2].'</td>
				<td>'.$data[6].'</td>
				<td>'.$data[3].'</td>
				<td>'.$data[4].'</td>
				<td>
					<a href="index.php?model=tirage&action=FormulaireEditionTirage&id='.$data[0].'">Editer</a>
				</td>
			</tr>';
			}
		$contenuPrincipal .= '</table>';
		
		$moreInfo[0] = array();
		$moreInfo[0]['titre'] = 'Actions';
		$moreInfo[0]['contenu'] = 
		'<a href="index.php?model=tirage&action=FormulaireNouveauTirage">Ajouter un tirage</a>';
		
		require_once($this->model->template);
		}
	
	public final  function AfficherTirage() 
		{
		if(isset($_GET['id']))
			{
			$data = $this->model->RechercherInfoTirage($_GET['id']);
			
			$titrePage = "Détail du tirage ".$data['numeroTirage'];
			$contenuPrincipal = '
			<table>
				<tr>
					<td>Identifiant : </td>
					<td>'.$data['id'].'</td>
				</tr>
				<tr>
					<td>Numéro du tirage : </td>
					<td>'.$data['numeroTirage'].'</td>
				</tr>
				<tr>
					<td>Date du tirage : </td>
					<td>'.$data['dateJeu'].'</td>
				</tr>
				<tr>
					<td>Moment du tirage : </td>
					<td>'.$data['momentTirage'].'</td>
				</tr>
				<tr>
					<td>Liste des numéros : </td>
					<td>'.$data['listeNumeroSorti'].'</td>
				</tr>
				<tr>
					<td>Multiplicateur : </td>
					<td>x '.$data['valeurMultiplicateur'].'</td>
				</tr>
				<tr>
					<td>Date de forclusion : </td>
					<td>'.$data['dateForclusion'].'</td>
				</tr>
				<tr>
					<td>Numéro Jackpot : </td>
					<td>'.$data['numeroJackpot'].'</td>
				</tr>
				<tr>
					<td>Montant du Jackpot : </td>
					<td>'.$data['montantJackpot'].'</td>
				</tr>
				<tr>
					<td>Numéro de Joker+ : </td>
					<td>'.$data['numeroJokerplus'].'</td>
				</tr>
			</table>';
			
			$moreInfo[0] = array();
			$moreInfo[0]['titre'] = 'Actions';
			$moreInfo[0]['contenu'] = 
			'<a href="index.php?model=tirage&action=FormulaireEditionTirage&id='.$data['id'].'">Editer</a>';
			
			require_once($this->model->template);
			}
		else
			echo '<meta http-equiv="refresh" content="0;URL=index.php?model=tirage&action=AfficherTousTirage">';
		}
		
	public final  function FormulaireEditionTirage() 
		{
		if(isset($_POST['id']))
			$_idTirage = $_POST['id'];
		else
			$_idTirage = $_GET['id'];
		
		if(isset($_POST['valider_form']))
			{
			$error = $this->controller->VerifierTirage($_POST);
			
			if(!$error)
				{
				$this->model->Hydrateur($_POST);
				$this->model->EnregistrerTirage();
				
				echo '<meta http-equiv="refresh" content="0;URL=index.php?model=tirage&action=AfficherTirage&id='.$_POST['id'].'">';
				exit();
				}
			else
				{
				$id = $_POST['id'];
				$numeroTirage = $_POST['numeroTirage'];
				$dateJeu = $_POST['dateJeu'];
				$momentTirage = $_POST['momentTirage'];
				$listeNumeroSorti = $_POST['listeNumeroSorti'];
				$valeurMultiplicateur = $_POST['valeurMultiplicateur'];
				$dateForclusion = $_POST['dateForclusion'];
				$numeroJackpot = $_POST['numeroJackpot'];
				$montantJackpot = $_POST['montantJackpot'];
				$numeroJokerplus = $_POST['numeroJokerplus'];
				}
			}
		else
			{
			$data = $this->model->RechercherInfoTirage($_idTirage);
			$error = '';
			$id = $data['id'];
			$numeroTirage = $data['numeroTirage'];
			$dateJeu = $data['dateJeu'];
			$momentTirage = $data['momentTirage'];
			$listeNumeroSorti = $data['listeNumeroSorti'];
			$valeurMultiplicateur = $data['valeurMultiplicateur'];
			$dateForclusion = $data['dateForclusion'];
			$numeroJackpot = $data['numeroJackpot'];
			$montantJackpot = $data['montantJackpot'];
			$numeroJokerplus = $data['numeroJokerplus'];
			}
		
		$titrePage = "Détail du tirage ".$numeroTirage;
		$contenuPrincipal = '
		<ul>
			'.$error.'
		</ul>
		<form method="POST" action="index.php?model=tirage&action=FormulaireEditionTirage&id='.$id.'">
			<input type="hidden" name="id" id="id" value="'.$id.'"/>
			<table>
				<tr>
					<td>Numéro du tirage : </td>
					<td>
						<input type="text" name="numeroTirage" name="numeroTirage" value="'.$numeroTirage.'"/>
					</td>
				</tr>
				<tr>
					<td>Date du tirage : </td>
					<td>
						<input type="text" name="dateJeu" name="dateJeu" value="'.$dateJeu.'"/>
					</td>
				</tr>
				<tr>
					<td>Moment du tirage : </td>
					<td>
						<input type="text" name="momentTirage" name="momentTirage" value="'.$momentTirage.'"/>
					</td>
				</tr>
				<tr>
					<td>Liste des numéros : </td>
					<td>
						<input type="text" name="listeNumeroSorti" name="listeNumeroSorti" value="'.$listeNumeroSorti.'"/>
					</td>
				</tr>
				<tr>
					<td>Multiplicateur : </td>
					<td>
						<input type="text" name="valeurMultiplicateur" name="valeurMultiplicateur" value="'.$valeurMultiplicateur.'"/>
					</td>
				</tr>
				<tr>
					<td>Date de forclusion : </td>
					<td>
						<input type="text" name="dateForclusion" name="dateForclusion" value="'.$dateForclusion.'"/>
					</td>
				</tr>
				<tr>
					<td>Numéro Jackpot : </td>
					<td>
						<input type="text" name="numeroJackpot" name="numeroJackpot" value="'.$numeroJackpot.'"/>
					</td>
				</tr>
				<tr>
					<td>Montant du Jackpot : </td>
					<td>
						<input type="text" name="montantJackpot" name="montantJackpot" value="'.$montantJackpot.'"/>
					</td>
				</tr>
				<tr>
					<td>Numéro de Joker+ : </td>
					<td>
						<input type="text" name="numeroJokerplus" name="numeroJokerplus" value="'.$numeroJokerplus.'"/>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="valider_form" value="Enregistrer"/>
					</td>
				</tr>
			</table>
		</form>';
				
		require_once($this->model->template);
		}

	public final  function FormulaireNouveauTirage() 
		{
		if(isset($_POST['valider_form']))
			{
			$error = $this->controller->VerifierTirage($_POST, true);
			
			if(!$error)
				{
				$this->model->Hydrateur($_POST);
				$this->model->EnregistrerTirage();
				
				echo '<meta http-equiv="refresh" content="0;URL=index.php?model=tirage&action=AfficherTousTirage">';
				exit();
				}
			else
				{
				$id = $_POST['id'];
				$numeroTirage = $_POST['numeroTirage'];
				$dateJeu = $_POST['dateJeu'];
				$momentTirage = $_POST['momentTirage'];
				$listeNumeroSorti = $_POST['listeNumeroSorti'];
				$valeurMultiplicateur = $_POST['valeurMultiplicateur'];
				$dateForclusion = $_POST['dateForclusion'];
				$numeroJackpot = $_POST['numeroJackpot'];
				$montantJackpot = $_POST['montantJackpot'];
				$numeroJokerplus = $_POST['numeroJokerplus'];
				}
			}
		else
			{
			$error = '';
			$id = '';
			$numeroTirage = '';
			$dateJeu = '';
			$momentTirage = '';
			$listeNumeroSorti = '';
			$valeurMultiplicateur = '';
			$dateForclusion = '';
			$numeroJackpot = '';
			$montantJackpot = '';
			$numeroJokerplus = '';
			}
		
		$titrePage = "Détail du tirage ".$numeroTirage;
		$contenuPrincipal = '
		<ul>
			'.$error.'
		</ul>
		<form method="POST" action="index.php?model=tirage&action=FormulaireNouveauTirage">
			<input type="hidden" name="id" id="id" value="'.$id.'"/>
			<table>
				<tr>
					<td>Numéro du tirage : </td>
					<td>
						<input type="text" name="numeroTirage" name="numeroTirage" value="'.$numeroTirage.'"/>
					</td>
				</tr>
				<tr>
					<td>Date du tirage : </td>
					<td>
						<input type="text" name="dateJeu" name="dateJeu" value="'.$dateJeu.'"/>
					</td>
				</tr>
				<tr>
					<td>Moment du tirage : </td>
					<td>
						<input type="text" name="momentTirage" name="momentTirage" value="'.$momentTirage.'"/>
					</td>
				</tr>
				<tr>
					<td>Liste des numéros : </td>
					<td>
						<input type="text" name="listeNumeroSorti" name="listeNumeroSorti" value="'.$listeNumeroSorti.'"/>
					</td>
				</tr>
				<tr>
					<td>Multiplicateur : </td>
					<td>
						<input type="text" name="valeurMultiplicateur" name="valeurMultiplicateur" value="'.$valeurMultiplicateur.'"/>
					</td>
				</tr>
				<tr>
					<td>Date de forclusion : </td>
					<td>
						<input type="text" name="dateForclusion" name="dateForclusion" value="'.$dateForclusion.'"/>
					</td>
				</tr>
				<tr>
					<td>Numéro Jackpot : </td>
					<td>
						<input type="text" name="numeroJackpot" name="numeroJackpot" value="'.$numeroJackpot.'"/>
					</td>
				</tr>
				<tr>
					<td>Montant du Jackpot : </td>
					<td>
						<input type="text" name="montantJackpot" name="montantJackpot" value="'.$montantJackpot.'"/>
					</td>
				</tr>
				<tr>
					<td>Numéro de Joker+ : </td>
					<td>
						<input type="text" name="numeroJokerplus" name="numeroJokerplus" value="'.$numeroJokerplus.'"/>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" name="valider_form" value="Enregistrer"/>
					</td>
				</tr>
			</table>
		</form>';
				
		require_once($this->model->template);
		}
	}
?>