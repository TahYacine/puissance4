<?php
$mysqli=new mysqli("localhost","root","","dataBasePower4");#connexion à la base de données 
if($mysqli->connect_errno)#on vérifie qu'il n'y a pas de problèmes
{
    $_SESSION['error']="Problème de connexion à la base de données";
}

function enregistrerBdd()#fonction qui enregistre les valeurs dans la bdd sous la forme suivante : 
{
    GLOBAL $mysqli;
    $GrilleEnString=convertisseur($_SESSION['grille']);#la grille sous forme de string avec "_" comme séparateur de lignes et "," de colonnes
    $JoueurActuelEnString=implode(",",$_SESSION['JoueurActuel']);#le joueur Actuel avec booléan pour gagnant, le nom et la couleur
    $JoueurSuivantEnString=implode(",",$_SESSION['JoueurSuivant']);#de même pour le joueur Suivant
    //$ID=recup l'id en fonction du dernier;
    $req="INSERT INTO tableSave(`JoueurActuel`,`JoueurSuivant`,`Grille`)VALUES
    ('$JoueurActuelEnString','$JoueurSuivantEnString','$GrilleEnString')";#on écrit la requete 
    mysqli_query($mysqli,$req);#on insert dans la bdd
}
function convertisseur($array) {#fonction qui converti un tableau 2D en string, utile pour la grille en string
    $string = implode("_",array_map(function($a) {return implode(",",$a);},$array));
    return $string;
  }
?>