<?php
require("bdd.php");#on inclue le fichier bdd.php
if(session_status()==PHP_SESSION_NONE)
{
session_start();
}
include("fonctionsJeu.php");#on inclue le fichier fonctionsJeu qui contient toutes les fonctions utiles au puissance 4
if(empty($_SESSION['grille'])||isset($_POST['boutonReset'])||isset($_POST['boutonRetour'])){#si l'on vient de lancer la partie ou que l'on a appuyer sur le bouton reset ou retour
$_SESSION['grille']=initGrille();	
$_SESSION['etatDuCoup']="";
$_SESSION['JoueurActuel'][2]="-";
$_SESSION['JoueurSuivant'][2]="-";
unset($_POST['boutonReset']);#on unset le bouton reset mais pas le bouton retour qui a encore la redirection à faire
}

if(isset($_POST['boutonRetour']))#actions à faire au clic du bouton Retour
{
	unset($_POST['boutonRetour']);
	session_destroy();
	header('Location: index.php');
}
if(isset($_POST['boutonChoix']) && $_SESSION['JoueurActuel'][2]=="-")#si on appuie sur un jeton et qu'aucun joueur n'a gagné
{
	if(ajoutePionEn($_POST['boutonChoix'])===false)#si la colonne est remplie
	{
		$_SESSION['etatDuCoup']="Refaites le coup joueur ".$_SESSION['JoueurActuel'][1]."<br>";
	}
	else
	{
	if(youWin())#si le joueur Actuel a gagner
	{
		$_SESSION['JoueurActuel'][2]="Gagnant";#on met a jour les status des joueurs
		$_SESSION['JoueurSuivant'][2]="Perdant";
		$_SESSION['etatDuCoup']="gagné par ".$_SESSION['JoueurActuel'][1]." en couleur ".$_SESSION['JoueurActuel'][0]."<br>";
		enregistrerBdd();#on enregistre dans la bdd
	}
	else{
	$_SESSION['etatDuCoup']="placé par ".$_SESSION['JoueurActuel'][1]." c'est maintenant à ".$_SESSION['JoueurSuivant'][1]."<br>";
	$tmp=$_SESSION['JoueurActuel'];#sinon on inverse Actuel et Suivant
	$_SESSION['JoueurActuel']=$_SESSION['JoueurSuivant'];
	$_SESSION['JoueurSuivant']=$tmp;
	}
	header('Location: jeu.php');#permet d'éviter un bug trouvé pendant le code
	}
}
echo("<div class='classJeu'<br>");#affichage des boutons et de la grille
afficherBouton();
afficherGrille();
echo("</div>")

?>

