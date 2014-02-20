<?php

	echo "<div id=\"wrap\">

		<img class=\"banner\" src=\"images/banner01.jpg\" alt=\"\" />
		<div id=\"content\">";
		
		
		
		if (isset($_GET["nomprod"]) && $_GET["nomprod"] != NULL) //si on a un acteur
		{

		echo "<h1>".stripslashes($_GET["nomprod"])."</h1>";

			echo("<div class=\"left\">
			<img src=\"images/producteurs/".stripslashes(str_replace("é","e",str_replace("è","e",$_GET["nomprod"]))).".jpg\" alt=\"".$_GET["nomprod"]."\" />
			</div>
			<div id=\"right\">
			<h1>Filmography</h1>");			

				require "util.php";
				$resultats_requete = executer_requete("select * from film where metteurscene= '".stripslashes($_GET["nomprod"])."'");
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

				echo "<h1>Les producteurs</h1>";
				require "util.php";
				$resultats_requete = executer_requete("select distinct metteurscene from film order by metteurscene");
				$num = pg_num_rows($resultats_requete);

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				    
				   echo("<div class=\"affichefilm\"><p>
										<a href=\"producteur.php?nomprod=".rawurlencode($ligne_resultat->metteurscene)."\">$ligne_resultat->metteurscene</a><br />
										<img src=\"images/producteurs/".stripslashes(str_replace("é","e",str_replace("è","e",$ligne_resultat->metteurscene))).".jpg\" alt=\"".$ligne_resultat->metteurscene."\" /><br />
					</p></div>");
				} 

		}
			
	echo "</div>";
?>