<?php

class TechniqueComposee_View 
	{
	private $model;
	private $controller;
	private $baseURL = 'index.php?model=TechniqueComposee';
	private $mysqli;
	public final  function __construct(TechniqueComposee $_model, TechniqueComposee_Controller $_controller) 
		{
		$this->model = $_model;
		$this->controller = $_controller;
		$this->mysqli = $GLOBALS['mysqli'];
		}

	public final  function AfficherInfoTechnique() 
		{
		$techniqueId = $_GET['id'];
		
		$data = $this->model->RechercherInformationTechnique($techniqueId);
		$id = $data['id'];
		$nom = $data['nom'];
		$variante = $data['variante'];
		$version = $data['version'];
		$niveau = $data['niveau'];
		$etrePeriodeMorte = $data['etrePeriodeMorte'];
		$jeuNumero = $data['jeuNumero'];
		$jeuGrille = $data['jeuGrille'];
		$jeuPeriode = $data['jeuPeriode'];
		$jeuMise = $data['jeuMise'];
		$jeuMultiplicateur = $data['jeuMultiplicateur'];
		
		// Technique de choix de numéros
		$techniqueNumero = '';
		$reqTCNumero = "SELECT id, titre FROM tcconditionnumero ORDER BY titre ASC";
		$query = $this->mysqli->query($reqTCNumero);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				if($data['id'] == $jeuNumero)
					$techniqueNumero = $data['titre'];
				}
			}
		
		// Technique de choix de grille
		$techniqueGrille = '';
		$reqTCNumero = "SELECT id, titre FROM  tcconditiongrille ORDER BY titre ASC";
		$query = $this->mysqli->query($reqTCNumero);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				if($data['id'] == $jeuGrille)
					$techniqueGrille = $data['titre'];
				}
			}
		
		// Technique de choix de période
		$techniquePeriode = '';
		$reqTCNumero = "SELECT id, titre FROM  tcconditionperiode ORDER BY titre ASC";
		$query = $this->mysqli->query($reqTCNumero);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				$selected = '';
				if($data['id'] == $jeuPeriode)
					$techniquePeriode = $data['titre'];
				}
			}
		
		// Technique de choix de mise
		$techniqueMise = '';
		$reqTCNumero = "SELECT id, titre FROM  tcconditionmise ORDER BY titre ASC";
		$query = $this->mysqli->query($reqTCNumero);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				if($data['id'] == $jeuMise)
					$techniqueMise = $data['titre'];
				}
			}
		
		// Technique de choix de multiplicateur
		$techniqueMultiplicateur = '';
		$reqTCNumero = "SELECT id, titre FROM tcconditionmultiplicateur ORDER BY titre ASC";
		$query = $this->mysqli->query($reqTCNumero);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				if($data['id'] == $jeuMultiplicateur)
					$techniqueMultiplicateur = $data['titre'];
				}
			}
				
		$titrePage = "Editer la technique : ".$nom;
		$contenuPrincipal = '
		<table>
			<tr>
				<td>Titre de la technique : </td>
				<td>
					<span>'.$nom.'</span>
				</td>
			</tr>
			<tr>
				<td>Variante : </td>
				<td>
					<span>'.$variante.'</span>
				</td>
			</tr>
			<tr>
				<td>Version : </td>
				<td>
					<span>'.$version.'</span>
				</td>
			</tr>
			<tr>
				<td>Etre en période morte : </td>
				<td>
					<span>'.$etrePeriodeMorte.'</span>
				</td>
			</tr>
			<tr>
				<td>Niveau de la technique : </td>
				<td>
					<span>'.$niveau.'</span>
				</td>
			</tr>
			<tr>
				<td>Technique de numéro : </td>
				<td>
					<span>'.$techniqueNumero.'</span>
				</td>
			</tr>
			<tr>
				<td>technique de grille : </td>
				<td>
					<span>'.$techniqueGrille.'</span>
				</td>
			</tr>
			<tr>
				<td>Technique de période : </td>
				<td>
					<span>'.$techniquePeriode.'</span>
				</td>
			</tr>
			<tr>
				<td>Technique de mise : </td>
				<td>
					<span>'.$techniqueMise.'</span>
				</td>
			</tr>
			<tr>
				<td>Technique de Multiplicateur : </td>
				<td>
					<span>'.$techniqueMultiplicateur.'</span>
				</td>
			</tr>
		</table>';
		
		
		$moreInfo[0] = array();
		$moreInfo[0]['titre'] = 'Actions';
		$moreInfo[0]['contenu'] = '<a href="'.$this->baseURL.'&action=FormulaireEditionInformation&id='.$id.'">Editer la technique</a><br/>';
		$moreInfo[0]['contenu'] .= '<a href="'.$this->baseURL.'&action=ConfirmerSupprimerTechnique&id='.$id.'">Supprimer la technique</a>';
		
		require_once($GLOBALS['template']);
		}

	public final function ConfirmerSupprimerTechnique()
		{
		$idTechnique = $_GET['id'];
		$this->model->RechercherInformationTechnique($idTechnique);
		
		$contenuPrincipal = '
		<center>Etes vous sûr de vouloir supprimer la technique '.$this->model->RechercherNom().' ?</center><br/>
		<center>
			<input type="button" value="Oui" onClick="Javascript : window.location.href=\''.$this->baseURL.'&action=SupprimerTechnique&id='.$idTechnique.'\'">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="Non" onClick="Javascript : window.location.href=\''.$this->baseURL.'&action=VoirToutesTechniques\'">
		</center>
		';
		require_once($GLOBALS['template']);
		}
	
	public final function SupprimerTechnique()
		{
		$this->model->RechercherInformationTechnique($_GET['id']);		
		$this->model->SupprimerTechnique();
		
		echo '<meta http-equiv="refresh" content="0;URL='.$this->baseURL.'&action=VoirToutesTechniques">';
		exit();
		}	
		
	public final  function AfficherStatistiqueTechnique() 
		{
		}

	public final  function AfficherTableauResultat() 
		{
		}

	public final  function FormulaireEditionInformation() 
		{
		if(isset($_POST['id']))
			$_idTechnique = $_POST['id'];
		else
			$_idTechnique = $_GET['id'];
		
		if(isset($_POST['valider_form']))
			{
			$error = $this->controller->VerifierTechnique($_POST);
			
			if(!$error)
				{
				$this->model->Hydrateur($_POST);
				$this->model->EnregistrerTechnique();
				
				echo '<meta http-equiv="refresh" content="0;URL='.$this->baseURL.'&action=AfficherInfoTechnique&id='.$_idTechnique.'">';
				exit();
				}
			else
				{
				$id = $_POST['id'];
				$nom = $_POST['nom'];
				$variante = $_POST['variante'];
				$version = $_POST['version'];
				$niveau = $_POST['niveau'];
				$etrePeriodeMorte = $_POST['etrePeriodeMorte'];
				$jeuNumero = $_POST['jeuNumero'];
				$jeuGrille = $_POST['jeuGrille'];
				$jeuPeriode = $_POST['jeuPeriode'];
				$jeuMise = $_POST['jeuMise'];
				$jeuMultiplicateur = $_POST['jeuMultiplicateur'];
				}
			}
		else
			{
			$data = $this->model->RechercherInformationTechnique($_idTechnique);
			$error = '';
			$id = $data['id'];
			$nom = $data['nom'];
			$variante = $data['variante'];
			$version = $data['version'];
			$niveau = $data['niveau'];
			$etrePeriodeMorte = $data['etrePeriodeMorte'];
			$jeuNumero = $data['jeuNumero'];
			$jeuGrille = $data['jeuGrille'];
			$jeuPeriode = $data['jeuPeriode'];
			$jeuMise = $data['jeuMise'];
			$jeuMultiplicateur = $data['jeuMultiplicateur'];
			}
		
		// Combobox technique de choix de numéros
		$comboTechniqueNumero = '<select name="jeuNumero" id="jeuNumero"><option value="0">Aucune</option>';
		$req = "SELECT id, titre FROM tcconditionnumero ORDER BY titre ASC";
		$query = $this->mysqli->query($req);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				$selected = '';
				if($data['id'] == $jeuNumero)
					$selected = ' selected';
				$comboTechniqueNumero .= '<option value="'.$data['id'].'"'.$selected.'>'.$data['titre'].'</option>';
				}
			}
		$comboTechniqueNumero .= '</select>';
		
		// Combobox technique de choix de grille
		$comboTechniqueGrille = '<select name="jeuGrille" id="jeuGrille"><option value="0">Aucune</option>';
		$req = "SELECT id, titre FROM  tcconditiongrille ORDER BY titre ASC";
		$query = $this->mysqli->query($req);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				$selected = '';
				if($data['id'] == $jeuGrille)
					$selected = ' selected';
				$comboTechniqueGrille .= '<option value="'.$data['id'].'"'.$selected.'>'.$data['titre'].'</option>';
				}
			}
		$comboTechniqueGrille .= '</select>';
		
		// Combobox technique de choix de période
		$comboTechniquePeriode = '<select name="jeuPeriode" id="jeuPeriode"><option value="0">Aucune</option>';
		$req = "SELECT id, titre FROM  tcconditionperiode ORDER BY titre ASC";
		$query = $this->mysqli->query($req);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				$selected = '';
				if($data['id'] == $jeuPeriode)
					$selected = ' selected';
				$comboTechniquePeriode .= '<option value="'.$data['id'].'"'.$selected.'>'.$data['titre'].'</option>';
				}
			}
		$comboTechniquePeriode .= '</select>';
		
		// Combobox technique de choix de mise
		$comboTechniqueMise = '<select name="jeuMise" id="jeuMise"><option value="0">Aucune</option>';
		$req = "SELECT id, titre FROM  tcconditionmise ORDER BY titre ASC";
		$query = $this->mysqli->query($req);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				$selected = '';
				if($data['id'] == $jeuMise)
					$selected = ' selected';
				$comboTechniqueMise .= '<option value="'.$data['id'].'"'.$selected.'>'.$data['titre'].'</option>';
				}
			}
		$comboTechniqueMise .= '</select>';
		
		// Combobox technique de choix de multiplicateur
		$comboTechniqueMultiplicateur = '<select name="jeuMultiplicateur" id="jeuMultiplicateur"><option value="0">Aucune</option>';
		$req = "SELECT id, titre FROM tcconditionmultiplicateur ORDER BY titre ASC";
		$query = $this->mysqli->query($req);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				$selected = '';
				if($data['id'] == $jeuMultiplicateur)
					$selected = ' selected';
				$comboTechniqueMultiplicateur .= '<option value="'.$data['id'].'"'.$selected.'>'.$data['titre'].'</option>';
				}
			}
		$comboTechniqueMultiplicateur .= '</select>';
				
		$titrePage = "Editer la technique : ".$nom;
		$contenuPrincipal = '
		<ul>
			'.$error.'
		</ul>
		<form method="POST" action="'.$this->baseURL.'&action=FormulaireEditionInformation">
			<input type="hidden" name="id" id="id" value="'.$id.'"/>
			<table>
				<tr>
					<td>Titre de la technique : </td>
					<td>
						<input type="text" name="nom" name="nom" value="'.$nom.'"/>
					</td>
				</tr>
				<tr>
					<td>Variante : </td>
					<td>
						<input type="text" name="variante" name="variante" value="'.$variante.'"/>
					</td>
				</tr>
				<tr>
					<td>Version : </td>
					<td>
						<input type="text" name="version" name="version" value="'.$version.'"/>
					</td>
				</tr>
				<tr>
					<td>Etre en période morte : </td>
					<td>
						<input type="text" name="etrePeriodeMorte" name="etrePeriodeMorte" value="'.$etrePeriodeMorte.'"/>
					</td>
				</tr>
				<tr>
					<td>Niveau de la technique : </td>
					<td>
						<input type="text" name="niveau" name="niveau" value="'.$niveau.'"/>
					</td>
				</tr>
				<tr>
					<td>Technique de numéro : </td>
					<td>
						'.$comboTechniqueNumero.'
					</td>
				</tr>
				<tr>
					<td>technique de grille : </td>
					<td>
						'.$comboTechniqueGrille.'
					</td>
				</tr>
				<tr>
					<td>Technique de période : </td>
					<td>
						'.$comboTechniquePeriode.'
					</td>
				</tr>
				<tr>
					<td>Technique de mise : </td>
					<td>
						'.$comboTechniqueMise.'
					</td>
				</tr>
				<tr>
					<td>Technique de Multiplicateur : </td>
					<td>
						'.$comboTechniqueMultiplicateur.'
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="button" value="Annuler" onClick="Javascript : window.location.href=\''.$this->baseURL.'&action=VoirToutesTechniques\'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="valider_form" value="Enregistrer"/>
					</td>
				</tr>
			</table>
		</form>';
				
		require_once($GLOBALS['template']);
		}

	public final  function FormulaireConfirmationSuppression() 
		{
		}

	public final  function FormulaireSuppression() 
		{
		}

	public final  function FormulaireRecalculerStatistique() 
		{
		}

	public final  function FormulaireCreation() 
		{
		if(isset($_POST['valider_form']))
			{
			$error = $this->controller->VerifierTechnique($_POST, true);
			
			if(!$error)
				{
				$this->model->Hydrateur($_POST);
				$this->model->EnregistrerTechnique();
				
				echo '<meta http-equiv="refresh" content="0;URL='.$this->baseURL.'&action=VoirToutesTechniques">';
				exit();
				}
			else
				{
				$nom = $_POST['nom'];
				$variante = $_POST['variante'];
				$version = $_POST['version'];
				$niveau = $_POST['niveau'];
				$etrePeriodeMorte = $_POST['etrePeriodeMorte'];
				$jeuNumero = $_POST['jeuNumero'];
				$jeuGrille = $_POST['jeuGrille'];
				$jeuPeriode = $_POST['jeuPeriode'];
				$jeuMise = $_POST['jeuMise'];
				$jeuMultiplicateur = $_POST['jeuMultiplicateur'];
				}
			}
		else
			{
			$error = '';
			$nom = '';
			$variante = '';
			$version = '';
			$niveau = '';
			$etrePeriodeMorte = '';
			$jeuNumero = '';
			$jeuGrille = '';
			$jeuPeriode = '';
			$jeuMise = '';
			$jeuMultiplicateur = '';
			}
		
		// Combobox technique de choix de numéros
		$comboTechniqueNumero = '<select name="jeuNumero" id="jeuNumero"><option value="0">Aucune</option>';
		$reqTCNumero = "SELECT id, titre FROM tcconditionnumero ORDER BY titre ASC";
		$query = $this->mysqli->query($reqTCNumero);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				$selected = '';
				if($data['id'] == $jeuNumero)
					$selected = ' selected';
				$comboTechniqueNumero .= '<option value="'.$data['id'].'"'.$selected.'>'.$data['titre'].'</option>';
				}
			}
		$comboTechniqueNumero .= '</select>';
		
		// Combobox technique de choix de grille
		$comboTechniqueGrille = '<select name="jeuGrille" id="jeuGrille"><option value="0">Aucune</option>';
		$reqTCNumero = "SELECT id, titre FROM  tcconditiongrille ORDER BY titre ASC";
		$query = $this->mysqli->query($reqTCNumero);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				$selected = '';
				if($data['id'] == $jeuGrille)
					$selected = ' selected';
				$comboTechniqueGrille .= '<option value="'.$data['id'].'"'.$selected.'>'.$data['titre'].'</option>';
				}
			}
		$comboTechniqueGrille .= '</select>';
		
		// Combobox technique de choix de période
		$comboTechniquePeriode = '<select name="jeuPeriode" id="jeuPeriode"><option value="0">Aucune</option>';
		$reqTCNumero = "SELECT id, titre FROM  tcconditionperiode ORDER BY titre ASC";
		$query = $this->mysqli->query($reqTCNumero);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				$selected = '';
				if($data['id'] == $jeuPeriode)
					$selected = ' selected';
				$comboTechniquePeriode .= '<option value="'.$data['id'].'"'.$selected.'>'.$data['titre'].'</option>';
				}
			}
		$comboTechniquePeriode .= '</select>';
		
		// Combobox technique de choix de mise
		$comboTechniqueMise = '<select name="jeuMise" id="jeuMise"><option value="0">Aucune</option>';
		$reqTCNumero = "SELECT id, titre FROM  tcconditionmise ORDER BY titre ASC";
		$query = $this->mysqli->query($reqTCNumero);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				$selected = '';
				if($data['id'] == $jeuMise)
					$selected = ' selected';
				$comboTechniqueMise .= '<option value="'.$data['id'].'"'.$selected.'>'.$data['titre'].'</option>';
				}
			}
		$comboTechniqueMise .= '</select>';
		
		// Combobox technique de choix de multiplicateur
		$comboTechniqueMultiplicateur = '<select name="jeuMultiplicateur" id="jeuMultiplicateur"><option value="0">Aucune</option>';
		$reqTCNumero = "SELECT id, titre FROM tcconditionmultiplicateur ORDER BY titre ASC";
		$query = $this->mysqli->query($reqTCNumero);
		if($query->num_rows > 0)
			{
			while($data = $query->fetch_assoc())
				{
				$selected = '';
				if($data['id'] == $jeuMultiplicateur)
					$selected = ' selected';
				$comboTechniqueMultiplicateur .= '<option value="'.$data['id'].'"'.$selected.'>'.$data['titre'].'</option>';
				}
			}
		$comboTechniqueMultiplicateur .= '</select>';
				
		$titrePage = "Editer la technique : ".$nom;
		$contenuPrincipal = '
		<ul>
			'.$error.'
		</ul>
		<form method="POST" action="'.$this->baseURL.'&action=FormulaireCreation">
			<table>
				<tr>
					<td>Titre de la technique : </td>
					<td>
						<input type="text" name="nom" name="nom" value="'.$nom.'"/>
					</td>
				</tr>
				<tr>
					<td>Variante : </td>
					<td>
						<input type="text" name="variante" name="variante" value="'.$variante.'"/>
					</td>
				</tr>
				<tr>
					<td>Version : </td>
					<td>
						<input type="text" name="version" name="version" value="'.$version.'"/>
					</td>
				</tr>
				<tr>
					<td>Etre en période morte : </td>
					<td>
						<input type="text" name="etrePeriodeMorte" name="etrePeriodeMorte" value="'.$etrePeriodeMorte.'"/>
					</td>
				</tr>
				<tr>
					<td>Niveau de la technique : </td>
					<td>
						<input type="text" name="niveau" name="niveau" value="'.$niveau.'"/>
					</td>
				</tr>
				<tr>
					<td>Technique de numéro : </td>
					<td>
						'.$comboTechniqueNumero.'
					</td>
				</tr>
				<tr>
					<td>technique de grille : </td>
					<td>
						'.$comboTechniqueGrille.'
					</td>
				</tr>
				<tr>
					<td>Technique de période : </td>
					<td>
						'.$comboTechniquePeriode.'
					</td>
				</tr>
				<tr>
					<td>Technique de mise : </td>
					<td>
						'.$comboTechniqueMise.'
					</td>
				</tr>
				<tr>
					<td>Technique de Multiplicateur : </td>
					<td>
						'.$comboTechniqueMultiplicateur.'
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="button" value="Annuler" onClick="Javascript : window.location.href=\''.$this->baseURL.'&action=VoirToutesTechniques\'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="submit" name="valider_form" value="Enregistrer"/>
					</td>
				</tr>
			</table>
		</form>';
				
		require_once($this->model->template);
		}
		
	public final function VoirToutesTechniques()
		{
		$query = $this->controller->RechercherLesTechniquesComposees();
		$titrePage = "Techniques composées";
		
		if(!$query)
			$contenuPrincipal = '<center>Il n\'existe aucune technique composée pour le moment.</center>';
		else
			{
			$contenuPrincipal = '<table>
			<tr>
				<th>Titre</th>
				<th>Variante</th>
				<th>Version</th>
				<th>Etre en période morte</th>
				<th>Niveau estimé</th>
				<th>&nbsp;</th>
			</tr>';
			
			while($data = $query->fetch_assoc())
				{
				$contenuPrincipal .= '
				<tr>
					<td>
						<a href="'.$this->baseURL.'&action=AfficherInfoTechnique&id='.$data['id'].'">'.$data['nom'].'</a>
					</td>
					<td>'.$data['variante'].'</td>
					<td>'.$data['version'].'</td>
					<td>'.$data['etrePeriodeMorte'].'</td>
					<td>'.$data['niveau'].'</td>
					<td>
						<a href="'.$this->baseURL.'&action=FormulaireEditionInformation&id='.$data['id'].'">Editer</a><br/>
						<a href="'.$this->baseURL.'&action=FormulaireConfirmationSuppression&id='.$data['id'].'">Supprimer</a>
					</td>
				</tr>';
				}
				
			$contenuPrincipal .= '</table>';
			}
		
		$moreInfo[0] = array();
		$moreInfo[0]['titre'] = 'Actions';
		$moreInfo[0]['contenu'] = '<a href="'.$this->baseURL.'&action=FormulaireCreation">Créer une technique composée</a>';
		require_once($GLOBALS['template']);
		}
	}
?>