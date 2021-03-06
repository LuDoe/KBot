<?php
if(empty($titrePage))
	$titrePage = '';
	
if(empty($contenuPrincipal))
	$contenuPrincipal = '';
	
if(empty($moreInfo))
	$moreInfo = false;	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>KBot</title>
		<link rel="stylesheet" href="css/main.css">
		<script src="js/main.js"></script>
	</head>
	<body>
		<header>
			<span>KBOT</span>
		</header>
		<div id="main_container">
			<nav>
				<ul>
					<li>
						<span>Jeux</span>
						<ul>
							<li>
								<a href="index.php?model=tirage&action=AfficherTousTirage">Tirages</a>
							</li>
							<li>
								<a href="index.php?model=tableauDesGains&action=AfficherTableGain">Tableau des gains</a>
							</li>
							<li>
								<a href="index.php?model=simulateur&action=AfficherStrategieJoueur">Simulateur</a>
							</li>
							<li>
								<a href="index.php?model=jeu&action=AfficherDerniersJeux">Jeux</a>
							</li>
							<li>
								<a href="index.php?model=jeuEnCours&action=AfficherJeuxEnCours">Jeux en cours</a>
							</li>
							<li>
								<a href="index.php?model=jeuEnSimulation&action=AfficherSimulationUtilisateur">Jeux simulés</a>
							</li>
						</ul>
					</li>
					<li>
						<span>Techniques composés</span>
						<ul>
							<li>
								<a href="index.php?model=techniqueComposee&action=VoirToutesTechniques">Accueil des techniques composés</a>
							</li>
							<li>
								<a href="index.php?model=TCConditionNumero&action=AfficherToutesTechniques">Techniques de Numéro</a>
							</li>
							<li>
								<a href="index.php?model=TCConditionMise&action=AfficherToutesTechniques">Techniques de Mise</a>
							</li>
							<li>
								<a href="index.php?model=TCConditionGrille&action=AfficherToutesTechniques">Techniques de Grille</a>
							</li>
							<li>
								<a href="index.php?model=TCConditionPeriode&action=AfficherToutesTechniques">Techniques de Période</a>
							</li>
							<li>
								<a href="index.php?model=TCConditionMultiplicateur&action=AfficherToutesTechniques">Techniques pour le Multiplicateur</a>
							</li>
						</ul>
					
					</li>
					<li>Utilisateur</li>
					<li>Abonnement</li>
				</ul>
			</nav>
			<section>
				<article>
					<h1><?php echo $titrePage; ?></h1>
					<?php echo $contenuPrincipal; ?>
				</article>
				
				<?php
				if($moreInfo)
					{
					foreach($moreInfo AS $value)
						{
						echo '
						<aside>
							<fieldset>
								<legend>'.$value['titre'].'</legend>
								'.$value['contenu'].'
							</fieldset>
						</aside>';
						}
					}
				?>
			</section>
			<br clear="all"/>
		</div>
		<footer>
			<p>Pied de page</p>
		</footer>		
	</body>
</html>