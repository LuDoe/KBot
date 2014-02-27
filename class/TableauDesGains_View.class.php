<?php

class TableauDesGains_View 	
	{
	private  $model;
	private  $controller;
	
	public final  function __construct(TableauDesGains $_model, TableauDesGains_Controller $_controller) 
		{
		$this->model = $_model;
		$this->controller = $_controller;
		}

	public final  function AfficherLigneGain() 
		{
		
		}

	public final  function FormulaireAjouterLigne() 
		{
		if(isset($_POST['valider_form']))
			{
			$error = $this->controller->VerifierLigne($_POST, true);
			
			if(!$error)
				{
				$this->model->Hydrateur($_POST);
				$this->model->EnregistrerLigne();
				
				echo '<meta http-equiv="refresh" content="0;URL=index.php?model=tableauDesGains&action=AfficherTableGain">';
				exit();
				}
			else
				{
				$id = $_POST['id'];
				$nombreJoue = $_POST['nombreJoue'];
				$mise = $_POST['mise'];
				$nombreTrouve = $_POST['nombreTrouve'];
				$gain = $_POST['gain'];
				$aVie = $_POST['aVie'];
				$chanceGain = $_POST['chanceGain'];
				$depense = $_POST['depense'];
				}
			}
		else
			{
			$error = '';
			$id = '';
			$nombreJoue = '';
			$nombreTrouve = '';
			$mise = '';
			$gain = '';
			$aVie = '';
			$chanceGain = '';
			$depense = '';
			}
		
		$titrePage = "Ajouter une ligne au tableau des gains";
		$contenuPrincipal = '
		<ul>
			'.$error.'
		</ul>
		<form method="POST" action="index.php?model=tableauDesGains&action=FormulaireAjouterLigne">
			<input type="hidden" name="id" id="id" value="'.$id.'"/>
			<table>
				<tr>
					<td>Nombre de chiffre misé : </td>
					<td>
						<input type="text" name="nombreJoue" name="nombreJoue" value="'.$nombreJoue.'"/>
					</td>
				</tr>
				<tr>
					<td>Nombre de chiffre trouvé : </td>
					<td>
						<input type="text" name="nombreTrouve" name="nombreTrouve" value="'.$nombreTrouve.'"/>
					</td>
				</tr>
				<tr>
					<td>Mise : </td>
					<td>
						<input type="text" name="mise" name="mise" value="'.$mise.'"/>
					</td>
				</tr>
				<tr>
					<td>Gain : </td>
					<td>
						<input type="text" name="gain" name="gain" value="'.$gain.'"/>
					</td>
				</tr>
				<tr>
					<td>Gain à vie : </td>
					<td>
						<input type="text" name="aVie" name="aVie" value="'.$aVie.'"/>
					</td>
				</tr>
				<tr>
					<td>Chance : </td>
					<td>
						<input type="text" name="chanceGain" name="chanceGain" value="'.$chanceGain.'"/>
					</td>
				</tr>
				<tr>
					<td>Dépense : </td>
					<td>
						<input type="text" name="depense" name="depense" value="'.$depense.'"/>
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

	public final  function FormulaireEditionLigne() 
		{
		if(isset($_POST['id']))
			$_idLigne = $_POST['id'];
		else
			$_idLigne = $_GET['id'];
		
		if(isset($_POST['valider_form']))
			{
			$error = $this->controller->VerifierLigne($_POST);
			
			if(!$error)
				{
				$this->model->Hydrateur($_POST);
				$this->model->EnregistrerLigne();
				
				echo '<meta http-equiv="refresh" content="0;URL=index.php?model=tableauDesGains&action=AfficherTableGain">';
				exit();
				}
			else
				{
				$id = $_POST['id'];
				$nombreJoue = $_POST['nombreJoue'];
				$nombreJoue = $_POST['nombreTrouve'];
				$mise = $_POST['mise'];
				$gain = $_POST['gain'];
				$aVie = $_POST['aVie'];
				$chanceGain = $_POST['chanceGain'];
				$depense = $_POST['depense'];
				}
			}
		else
			{
			$data = $this->model->RechercherLigneGain($_idLigne);
			$error = '';
			$id = $data['id'];
			$nombreJoue = $data['nombreJoue'];
			$nombreTrouve = $data['nombreTrouve'];
			$mise = $data['mise'];
			$gain = $data['gain'];
			$aVie = $data['aVie'];
			$chanceGain = $data['chanceGain'];
			$depense = $data['depense'];
			}
		
		$titrePage = "Détail du tableau des gains : pour ".$nombreJoue." numéro";
		$contenuPrincipal = '
		<ul>
			'.$error.'
		</ul>
		<form method="POST" action="index.php?model=tableauDesGains&action=FormulaireEditionLigne&id='.$id.'">
			<input type="hidden" name="id" id="id" value="'.$id.'"/>
			<table>
				<tr>
					<td>Nombre de chiffre misé : </td>
					<td>
						<input type="text" name="nombreJoue" name="nombreJoue" value="'.$nombreJoue.'"/>
					</td>
				</tr>
				<tr>
					<td>Nombre de chiffre trouvé : </td>
					<td>
						<input type="text" name="nombreTrouve" name="nombreTrouve" value="'.$nombreTrouve.'"/>
					</td>
				</tr>
				<tr>
					<td>Mise : </td>
					<td>
						<input type="text" name="mise" name="mise" value="'.$mise.'"/>
					</td>
				</tr>
				<tr>
					<td>Gain : </td>
					<td>
						<input type="text" name="gain" name="gain" value="'.$gain.'"/>
					</td>
				</tr>
				<tr>
					<td>Gain à vie : </td>
					<td>
						<input type="text" name="aVie" name="aVie" value="'.$aVie.'"/>
					</td>
				</tr>
				<tr>
					<td>Chance : </td>
					<td>
						<input type="text" name="chanceGain" name="chanceGain" value="'.$chanceGain.'"/>
					</td>
				</tr>
				<tr>
					<td>Dépense : </td>
					<td>
						<input type="text" name="depense" name="depense" value="'.$depense.'"/>
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

	public final  function AfficherTableGain() 
		{
		$query = $this->controller->ObtenirToutesLignes();
		$titrePage = "Tableau des gains";
		
		if($query)
			{
			$contenuPrincipal = '<table>
				<tr>
					<th>Nombre de numéro joué</th>
					<th>Nombre de numéro trouvé</th>
					<th>Mise</th>
					<th>Gain</th>
					<th>Chance de gain</th>
					<th>Dépense</th>
					<th>&nbsp;</th>
				</tr>';
			
			while($data = $query->fetch_assoc())
				{
				$contenuPrincipal .= '
				<tr>
					<td>'.$data['nombreJoue'].'</td>
					<td>'.$data['nombreTrouve'].'</td>
					<td>'.$data['mise'].'</td>
					<td>'.$data['gain'].' &euro;</td>
					<td>'.$data['chanceGain'].'</td>
					<td>'.$data['depense'].' &euro;</td>
					<td>
						<a href="index.php?model=tableauDesGains&action=FormulaireEditionLigne&id='.$data['id'].'">Editer</a>
					</td>
				</tr>';
				}
				
			$contenuPrincipal .= '</table>';
			}
		else
			{
			$contenuPrincipal = '<center>Il n\'y a pas d\'enregistrement pour le moment.</center>';
			}
		
		$moreInfo[0] = array();
		$moreInfo[0]['titre'] = 'Actions';
		$moreInfo[0]['contenu'] = '<a href="index.php?model=tableauDesGains&action=FormulaireAjouterLigne">Ajouter une ligne</a>';
		require_once($this->model->template);
		
		}
	}
?>