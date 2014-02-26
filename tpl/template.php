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
			<h1><?php echo $data; ?></h1>
		</header>
		<div id="main_container">
			<nav>
				<ul>
					<li>Utilisateur</li>
					<li>Stratégie</li>
					<li>Abonnement</li>
				</ul>
			</nav>
			<section>
				<article>
					<?php echo $content ?>
				</article>
				<aside>
					<fieldset>
						<legend>Cagnotte</legend>
						<?php echo $cagnotte; ?>
					</fieldset>
				</aside>
				<aside>
					<fieldset>
						<legend>Dernier tirage</legend>
						<p>2 ; 5 ; 8 ; ...</p>
					</fieldset>
				</aside>
			</section>
			<br clear="all"/>
		</div>
		<footer>
			<p>Pied de page</p>
		</footer>		
	</body>
</html>