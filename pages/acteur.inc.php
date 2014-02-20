<?php

	echo "<div id=\"wrap\">

		<img class=\"banner\" src=\"images/banner01.jpg\" alt=\"\" />
		<div id=\"content\">";
		
		
		
		if (isset($_GET["nomact"]) && $_GET["nomact"] != NULL) //si on a un acteur
		{

		echo "<h1>".stripslashes($_GET["nomact"])."</h1>";

			echo("<div class=\"left\">
			<img src=\"images/acteurs/".stripslashes(str_replace("é","e",str_replace("è","e",$_GET["nomact"]))).".jpg\" alt=\"".$_GET["nomact"]."\" />
			</div>
			<div id=\"right\">
			<h1>Filmography</h1>");			

				require "util.php";
				$resultats_requete = executer_requete("select * from acteur where nomact= '".stripslashes($_GET["nomact"])."'");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("
										<a href=\"film.php?film=".rawurlencode($ligne_resultat->titre)."\">$ligne_resultat->titre</a>
					");
				} 

			echo("</div>");

		}else{ //si on n'a pas d'acteur

				echo "<h1>Les Acteurs</h1>";
				require "util.php";
				$resultats_requete = executer_requete("select distinct nomact from acteur order by nomact");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("<div class=\"affichefilm\"><p>
										<a href=\"acteur.php?nomact=".rawurlencode($ligne_resultat->nomact)."\">$ligne_resultat->nomact</a><br />
										<img src=\"images/acteurs/".stripslashes(str_replace("é","e",str_replace("è","e",$ligne_resultat->nomact))).".jpg\" alt=\"".$ligne_resultat->nomact."\" /><br />
					</p></div>");
				} 

		}
			
	echo "</div>";
?>