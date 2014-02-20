	<div id="wrap">

		<img class="banner" src="images/banner01.jpg" alt="" />
		<div id="content">
			<h1>Recherche</h1>
						
				<?php
				require "util.php";
				
				echo("<h1>*** Les cinémas ***</h1>");
				$resultats_requete = executer_requete("SELECT * FROM cine WHERE nomcine ILIKE '%".$_GET["valrecherche"]."%' Order By nomcine");
				$num = pg_num_rows($resultats_requete);
				
					echo("<p>");
					$cpt = 0;
					for($i=0; $i<$num; $i++)
					{
					  $ligne_resultat = pg_fetch_object($resultats_requete);
    
					   echo("
					   <a href=\"cinema.php?nomcine=".rawurlencode($ligne_resultat->nomcine)."\">$ligne_resultat->nomcine<br /></a>
						");
						$cpt++;
					}
					if ($cpt==0){echo("Il n'y pas de résultats pour votre recherche");}
					echo("</p>");
									
				echo("<h1>*** Les films ***</h1>");
				$resultats_requete = executer_requete("SELECT * FROM film WHERE titre ILIKE '%".$_GET["valrecherche"]."%' Order By titre");
				$num = pg_num_rows($resultats_requete);
				
					echo("<p>");
					$cpt = 0;
					for($i=0; $i<$num; $i++)
					{
					  $ligne_resultat = pg_fetch_object($resultats_requete);
    
					   echo("
					   <a href=\"film.php?film=".rawurlencode($ligne_resultat->titre)."\">$ligne_resultat->titre<br /></a>
						");
						$cpt++;
					}
					if ($cpt==0){echo("Il n'y pas de résultats pour votre recherche");}
					echo("</p>");
									
				echo("<h1>*** Les acteurs ***</h1>");
				$resultats_requete = executer_requete("SELECT distinct nomact FROM acteur WHERE nomact ILIKE '%".$_GET["valrecherche"]."%' Order By nomact");
				$num = pg_num_rows($resultats_requete);
				
					echo("<p>");
					$cpt = 0;
					for($i=0; $i<$num; $i++)
					{
					  $ligne_resultat = pg_fetch_object($resultats_requete);
    
					   echo("
						<a href=\"acteur.php?nomact=".rawurlencode($ligne_resultat->nomact)."\">$ligne_resultat->nomact<br /></a>
						");
						$cpt++;
					}
					if ($cpt==0){echo("Il n'y pas de résultats pour votre recherche");}
					echo("</p>");
									
				echo("<h1>*** Les réalisateur ***</h1>");
				$resultats_requete = executer_requete("select distinct metteurscene from film where metteurscene ILIKE '%".$_GET["valrecherche"]."%' Order By metteurscene");
				$num = pg_num_rows($resultats_requete);
				
					echo("<p>");
					$cpt = 0;
					for($i=0; $i<$num; $i++)
					{
					  $ligne_resultat = pg_fetch_object($resultats_requete);
    
					   echo("
						<a href=\"realisateur.php?nomprod=".rawurlencode($ligne_resultat->metteurscene)."\">$ligne_resultat->metteurscene<br /></a>
						");
						$cpt++;
					}
					if ($cpt==0){echo("Il n'y pas de résultats pour votre recherche");}
					echo("</p>");
				?>
			
		</div>