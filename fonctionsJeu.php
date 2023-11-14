<?php
function initGrille()#fonction qui créer la grille remplie de "X", c'est à dire de cases vides
{
    $row=array();
	$grille=array();for($j=0;$j<$_SESSION['nbCol'];$j++)
    {
        $row[]="X";#ligne de n colonnes
    }
	for($i=0;$i<$_SESSION['nbLig'];$i++)
	{
		$grille[]=$row;#on ajoute la ligne
	}
	return $grille;
}

function afficherBouton()#fonction qui permet de créer les boutons reset et retour qui serviront pendant la partie
{
	echo("<form class='formBoutonChoix' style ='margin:0px' method='POST' action='jeu.php'>");
	echo("<button type='submit' class='boutonChoix' name='boutonReset'>Reset</button>");
	echo("<button type='submit' class='boutonChoix' name='boutonRetour'>Retour</button>");
	echo("<label id='boutonChoix' class='boutonEtat'>".$_SESSION['etatDuCoup']."</label><br></form><br>");#etat du coup servira à donner l'avancée de la partie
}
function afficherGrille()#fonction qui affiche la grille selon chaque case (couleur et gagnée)
{
	echo("<form class='formBoutonChoix' style ='margin:0px' method='POST' action='jeu.php'>");
	for($i=0;$i<$_SESSION['nbLig'];$i++)
	{
		for($j=0;$j<$_SESSION['nbCol'];$j++)
		{
			echo("<button value='$j' type='submit' class='jeton' name='boutonChoix'>");
			if($_SESSION['grille'][$i][$j]=="X")
			{
				echo("<img class='jetonImg' src=styles/vide.jpg>");
			}
			else if($_SESSION['grille'][$i][$j]=="Rouge")
			{
				echo("<img class='jetonImg' src=styles/rouge.jpg>");
			}
			else if($_SESSION['grille'][$i][$j]=="Jaune")
			{
				echo("<img class='jetonImg' src=styles/jaune.jpg>");
			}
			else if($_SESSION['grille'][$i][$j]=="WJaune")
			{
				echo("<img class='jetonImg' src=styles/winJaune.jpg>");
			}
			else
			{
				echo("<img class='jetonImg' src=styles/winRouge.jpg>");
			}
			echo("</button>");
		}
		echo('<br>');
	}
	echo("<form id='formBoutonChoix' method='POST' action='jeu.php'>");
	}

function ajoutePionEn($col)#fonction qui ajoute un pion de la couleur du joueur Actuel dans la colone $col
{
	if($col<$_SESSION['nbCol'] && $col>=0 && $_SESSION['grille'][0][$col]=="X")
	{
		for($i=$_SESSION['nbLig']-1;$i>=0;$i--)
		{
			if($_SESSION['grille'][$i][$col]=="X")
			{
				$_SESSION['grille'][$i][$col]=$_SESSION["JoueurActuel"][0];
				return true;
			}
		}
	}
	else
	{
		return false;
	}
}

function youWin()#fonction qui vérifie si 4 pions sont alignés horizontalement, verticalement ou en diagonales
{
	for($i=0;$i<$_SESSION['nbLig'];$i++)
	{
		for($j=0;$j<$_SESSION['nbCol']-3;$j++)
		{
			{
				if($_SESSION['grille'][$i][$j]==$_SESSION['JoueurActuel'][0] && 
			$_SESSION['grille'][$i][$j+1]==$_SESSION['JoueurActuel'][0] && 
			$_SESSION['grille'][$i][$j+2]==$_SESSION['JoueurActuel'][0] && 
			$_SESSION['grille'][$i][$j+3]==$_SESSION['JoueurActuel'][0])
			{
			$_SESSION['grille'][$i][$j]="W".$_SESSION['JoueurActuel'][0]; 
			$_SESSION['grille'][$i][$j+1]="W".$_SESSION['JoueurActuel'][0]; 
			$_SESSION['grille'][$i][$j+2]="W".$_SESSION['JoueurActuel'][0]; 
			$_SESSION['grille'][$i][$j+3]="W".$_SESSION['JoueurActuel'][0];
				return true;
			}
			}
		}
	}
	for($j=0;$j<$_SESSION['nbCol'];$j++)
	{
		for($i=0;$i<$_SESSION['nbLig']-3;$i++)
		{
			{
				if($_SESSION['grille'][$i][$j]==$_SESSION['JoueurActuel'][0] && 
			$_SESSION['grille'][$i+1][$j]==$_SESSION['JoueurActuel'][0] && 
			$_SESSION['grille'][$i+2][$j]==$_SESSION['JoueurActuel'][0] && 
			$_SESSION['grille'][$i+3][$j]==$_SESSION['JoueurActuel'][0])
			{
				$_SESSION['grille'][$i][$j]="W".$_SESSION['JoueurActuel'][0]; 
				$_SESSION['grille'][$i+1][$j]="W".$_SESSION['JoueurActuel'][0]; 
				$_SESSION['grille'][$i+2][$j]="W".$_SESSION['JoueurActuel'][0]; 
				$_SESSION['grille'][$i+3][$j]="W".$_SESSION['JoueurActuel'][0];
					return true;
				}
			}
		}
	}
	for($i=0;$i<$_SESSION['nbLig']-3;$i++)
	{
		for($j=3;$j<$_SESSION['nbCol'];$j++)
		{
			{
				if($_SESSION['grille'][$i][$j-3]==$_SESSION['JoueurActuel'][0] && 
			$_SESSION['grille'][$i+1][$j-2]==$_SESSION['JoueurActuel'][0] && 
			$_SESSION['grille'][$i+2][$j-1]==$_SESSION['JoueurActuel'][0] && 
			$_SESSION['grille'][$i+3][$j]==$_SESSION['JoueurActuel'][0])
			{
				$_SESSION['grille'][$i][$j-3]="W".$_SESSION['JoueurActuel'][0]; 
				$_SESSION['grille'][$i+1][$j-2]="W".$_SESSION['JoueurActuel'][0]; 
				$_SESSION['grille'][$i+2][$j-1]="W".$_SESSION['JoueurActuel'][0]; 
				$_SESSION['grille'][$i+3][$j]="W".$_SESSION['JoueurActuel'][0];
					return true;
				}	
			}
		}
	}
	for($i=3;$i<$_SESSION['nbLig'];$i++)
	{
		for($j=0;$j<$_SESSION['nbCol']-3;$j++)
		{
			{
				if($_SESSION['grille'][$i][$j]==$_SESSION['JoueurActuel'][0] && 
			$_SESSION['grille'][$i-1][$j+1]==$_SESSION['JoueurActuel'][0] && 
			$_SESSION['grille'][$i-2][$j+2]==$_SESSION['JoueurActuel'][0] && 
			$_SESSION['grille'][$i-3][$j+3]==$_SESSION['JoueurActuel'][0])
			{
				$_SESSION['grille'][$i][$j]="W".$_SESSION['JoueurActuel'][0]; 
				$_SESSION['grille'][$i-1][$j+1]="W".$_SESSION['JoueurActuel'][0]; 
				$_SESSION['grille'][$i-2][$j+2]="W".$_SESSION['JoueurActuel'][0]; 
				$_SESSION['grille'][$i-3][$j+3]="W".$_SESSION['JoueurActuel'][0];
					return true;
				}				
			}
		}
	}
	return false;
}
?>


<html><!--partie html permettant de liée le document au css-->
		<link rel="stylesheet" href="styles/gameStyles.css">
		<style>
		@import url('https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap');
		</style>
</html>