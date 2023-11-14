<?php
if(session_status()==PHP_SESSION_NONE)
{
session_start();
}
if(isset($_GET['jouer']))#si on a cliquer sur le bouton
{
	if($_GET['nomJoueur1']===$_GET['nomJoueur2'])#on verifie que les deux noms sont différents
		echo('Noms identiques<br>');
	else if($_GET['couleurJoueur1']==$_GET['couleurJoueur2'])#on verifie que les deux couleurs sont différentes
		echo('Couleurs identiques<br>');
	else#si tout est bon on assigne les valeurs aux différentes variables de sessions
	{
	$_SESSION["JoueurActuel"][0]=$_GET['couleurJoueur1'];
	$_SESSION["JoueurActuel"][1]=$_GET['nomJoueur1'];
	$_SESSION["JoueurActuel"][2]="-";
	$_SESSION["JoueurSuivant"][0]=$_GET['couleurJoueur2'];
	$_SESSION["JoueurSuivant"][1]=$_GET['nomJoueur2'];
	$_SESSION["nbCol"]=$_GET['colonnes'];
	$_SESSION["nbLig"]=$_GET['lignes'];
	$_SESSION["JoueurSuivant"][2]="-";
	header('Location: jeu.php');
	}
}
?>

<HTML>
	<head>
		<style>
		@import url('https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap');
		</style>
		<title>EC1PHP Puissance 4</title>
		<link rel="stylesheet" href="styles/styles.css">
	</head>
	<body>
		<form class="formJouer" method="GET" action="index.php">
			<div class="Nom">
				<label id="nomJoueur1">Saisissez le nom du joueur 1</label>
				<input type="text" id="nomJoueur1" name="nomJoueur1"required></input>
				<label id="couleurJoueur1">Saisissez la couleur du joueur 1</label>
				<select id="couleurJoueur1" name="couleurJoueur1">
					<option value="Rouge" selected>Rouge</option>
					<option value="Jaune">Jaune</option>
				</select>
			</div>
			<div class="Nom">
				<label id="nomJoueur2">Saisissez le nom du joueur 2</label>
				<input type="text" id="nomJoueur2" name="nomJoueur2"required></input>
				<label id="couleurJoueur2">Saisissez la couleur du joueur 2</label>
				<select id="couleurJoueur2" name="couleurJoueur2">
					<option value="Rouge">Rouge</option>
					<option value="Jaune" selected>Jaune</option>
				</select>
			</div>	
			<div class="Nom">
				<label class="lastLab" id="lignes">Saisissez le nombre de lignes</label>
				<input class="lastLab" style="width:50px" type="number" min="4" value="6" id="lignes" name="lignes"required></input>
				<label class="lastLab" id="colonnes">Saisissez le nombre de colonnes</label>
				<input class="lastLab" style="width:50px" type="number" max="13" min="4" value="7"id="colonnes" name="colonnes"required></input>
			</div>
			<button class="boutonPrem"type="submit" name="jouer">Jouer</button>
		</form>
	</body>
</HTML>
