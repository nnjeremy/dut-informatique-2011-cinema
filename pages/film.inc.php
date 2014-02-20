<?php

	echo "<div id=\"wrap\">

		<img class=\"banner\" src=\"images/banner01.jpg\" alt=\"\" />
		<div id=\"content\">";
		
		
		
		if (isset($_GET["film"]) && $_GET["film"] != NULL && isset($_GET["nomcine"]) && $_GET["nomcine"] != NULL) { //si on demande un film pour un cine =>
		
		echo "<h1>".stripslashes($_GET["film"])."</h1>";
		echo "<p>";
				require "util.php";
				require "infofilm.php";
				$resultats_requete = executer_requete("select * from film where titre= '".$_GET["film"]."'");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("
										Réalisateur : <a href=\"realisateur.php?nomprod=".rawurlencode($ligne_resultat->metteurscene)."\">$ligne_resultat->metteurscene</a>
					");
				} 

			echo("<br /><br />");
			infofilm(stripslashes($_GET["film"]));
			
			echo("</p>
			<div class=\"left\">
			<img src=\"images/films/".stripslashes(str_replace("é","e",str_replace("è","e",$_GET["film"]))).".jpg\" alt=\"".$_GET["film"]."\" />
			</div>
			<div id=\"right\">
			<h1>".$_GET["nomcine"]."<br />Séances :</h1>");			

				$resultats_requete = executer_requete("select seance.heure, salle.numsalle, salle.prix from salle,seance where salle.titre= '".$_GET["film"]."' AND salle.numsalle=seance.numsalle AND salle.nomcine=seance.nomcine AND seance.nomcine='".$_GET["nomcine"]."' ORDER BY heure");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("<a href=\"billetterie.php?horaire=".rawurlencode("@".$ligne_resultat->numsalle."@").rawurlencode($ligne_resultat->heure."@")."&amp;titre=".rawurlencode(stripslashes($_GET["film"]))."&amp;nomcine=".rawurlencode(stripslashes($_GET["nomcine"]))."\">salle: ".$ligne_resultat->numsalle." Horaire: ".str_replace(".","h",$ligne_resultat->heure)." prix: ".$ligne_resultat->prix."</a>");
				} 
			
			echo("<br /><br /><h1>Acteurs</h1>");			

				$resultats_requete = executer_requete("select * from acteur where titre= '".$_GET["film"]."'");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("
										<a href=\"acteur.php?nomact=".rawurlencode($ligne_resultat->nomact)."\">$ligne_resultat->nomact</a>
					");
				} 
			
			echo("</div>");
			
		}
		
		elseif (isset($_GET["film"]) && $_GET["film"] != NULL) { //si on demande un film =>
		
		echo "<h1>".stripslashes($_GET["film"])."</h1>";
		echo "<p>";
				require "util.php";require "infofilm.php";
				$resultats_requete = executer_requete("select * from film where titre= '".$_GET["film"]."'");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("
										Réalisateur : <a href=\"realisateur.php?nomprod=".rawurlencode($ligne_resultat->metteurscene)."\">$ligne_resultat->metteurscene</a>
					");
				} 
			
			echo("<br /><br />");
			infofilm(stripslashes($_GET["film"]));

			echo("</p>
			<div class=\"left\">
			<img src=\"images/films/".stripslashes(str_replace("é","e",str_replace("è","e",$_GET["film"]))).".jpg\" alt=\"".$_GET["film"]."\" />
			</div>
			<div id=\"right\">
			<h1>Seance</h1>");			

				$resultats_requete = executer_requete("select * from salle where titre= '".$_GET["film"]."'");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("
										<a href=\"film.php?nomcine=".rawurlencode($ligne_resultat->nomcine)."&amp;film=".rawurlencode(stripslashes($_GET["film"]))."\">$ligne_resultat->nomcine</a>
					");
				} 

			echo "<br /><br /><h1>Acteurs</h1>";	

				$resultats_requete = executer_requete("select * from acteur where titre= '".$_GET["film"]."'");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("
										<a href=\"acteur.php?nomact=".rawurlencode($ligne_resultat->nomact)."\">$ligne_resultat->nomact</a>
					");
				} 

			echo("</div>");
			
		}
		else
		{
				echo "<h1>Actuellement en salle</h1>";
				require "util.php";
				$resultats_requete = executer_requete("select * from film");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("<div class=\"affichefilm\"><p>
										<a href=\"film.php?film=".rawurlencode($ligne_resultat->titre)."\">$ligne_resultat->titre</a><br />
										<img src=\"images/films/".stripslashes(str_replace("é","e",str_replace("è","e",$ligne_resultat->titre))).".jpg\" alt=\"".$ligne_resultat->titre."\" /><br />
					</p></div>");
				} 
		}
			
	echo "</div>";
?>