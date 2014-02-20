<?php

	echo "<div id=\"wrap\">

		<img class=\"banner\" src=\"images/banner01.jpg\" alt=\"\" />
		<div id=\"content\">";
		
		
		
		if (isset($_GET["nomcine"]) && $_GET["nomcine"] != NULL) {echo "<h1>".$_GET["nomcine"]."</h1>";} else {echo "<h1>Les Cinémas :</h1>";}
		
		if (isset($_GET["nomcine"]) && $_GET["nomcine"] != NULL) {
		
		echo "<p>";
				require "util.php";
				$resultats_requete = executer_requete("select * from cine where nomcine= '".$_GET["nomcine"]."'");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("
										$ligne_resultat->adresse
					");
				} 
		echo ("<br /><img src=\"images/cinema/".str_replace("é","e",str_replace("è","e",str_replace(" ","_",$_GET["nomcine"]))).".jpg\" alt=\"".$_GET["nomcine"]."\" /></p>");	
		
		}
		else {
		echo "<ul>";
				require "util.php";
				$resultats_requete = executer_requete("select * from cine");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("
								   		<li><a href=\"cinema.php?nomcine=".rawurlencode($ligne_resultat->nomcine)."\">$ligne_resultat->nomcine</a></li>
										<li>$ligne_resultat->adresse</li>
					");
				} 
		echo "</ul>";
		}
			
		
		if (isset($_GET["nomcine"]) && $_GET["nomcine"] != NULL) {
		echo("
			<div id=\"left\">
				<h1>A l'affiche</h1>");
				
				$resultats_requete = executer_requete("select film.titre from film,salle where salle.nomcine= '".$_GET["nomcine"]."' AND salle.titre=film.titre");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("<div class=\"affichefilm\"><p>
										<a href=\"film.php?film=".rawurlencode($ligne_resultat->titre)."&amp;nomcine=".rawurlencode($_GET["nomcine"])."\">$ligne_resultat->titre</a><br />
										<img src=\"images/films/".stripslashes(str_replace("é","e",str_replace("è","e",$ligne_resultat->titre))).".jpg\" alt=\"".$ligne_resultat->titre."\" /><br />
					</p></div>");
				} 

		echo "</div>";
		}
			
	echo "</div>";
?>