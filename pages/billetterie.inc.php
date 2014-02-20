	<?php
		
		echo("<div id=\"wrap\">

		<img class=\"banner\" src=\"images/banner01.jpg\" alt=\"\" />
		<div id=\"content\">
			<h1>La Billetterie</h1>");
		
		if (isset($_GET["nom"]) && isset($_GET["prenom"]) && isset($_GET["adresse"]) && isset($_GET["code_postal"]) && isset($_GET["telephone"]) && $_GET["code_postal"] != NULL && $_GET["telephone"] != NULL && $_GET["nom"] != NULL && $_GET["prenom"] != NULL && $_GET["adresse"] != NULL) {
		//si on a toutes les infos
		echo("ok");
		}
		elseif (isset($_GET["titre"]) && isset($_GET["nomcine"]) && isset($_GET["horaire"]) && $_GET["titre"] != NULL && $_GET["nomcine"] != NULL && $_GET["horaire"] != NULL) {
		//si on a toutes les infos sur le le cinema et le film
		
$heure=preg_replace('!\@(.+)\@(.+)\@!isU', '$2', $_GET["horaire"]);
$salle=preg_replace('!\@(.+)\@(.+)\@!isU', '$1', $_GET["horaire"]);
		
echo("<p>Film : ".stripslashes($_GET["titre"])."<br />
Cinema : ".$_GET["nomcine"]."<br />
Salle : ".$salle."<br />
Heure : ".str_replace(".","h",$heure)."</p>

<form action=\"billetterie.php\" method=\"get\">

  <fieldset>
	<legend>Vos coordonnées</legend>
		<label for=\"nom\">nom</label>
		<input type=\"text\" name=\"nom\" id=\"nom\" size=\"20\" /><br />
	
		<label for=\"prenom\">prenom</label>
		<input type=\"text\" name=\"prenom\" id=\"prenom\" size=\"20\" /><br />

		<label for=\"adresse\">adresse</label>
		<input type=\"text\" name=\"adresse\" id=\"adresse\" size=\"20\" /><br />

		<label for=\"code_postal\">code_postal</label>
		<input type=\"text\" name=\"code_postal\" id=\"code_postal\" size=\"20\" /><br />
		
		<label for=\"telephone\">telephone</label>
		<input type=\"text\" name=\"telephone\" id=\"telephone\" size=\"20\" /><br />
		
	   <input type=\"hidden\" name=\"nomcine\" value=\"".$_GET["nomcine"]."\" />
	   <input type=\"hidden\" name=\"salle\" value=\"".$salle."\" />
	   <input type=\"hidden\" name=\"heure\" value=\"".str_replace(".","h",$heure)."\" />
	   <input type=\"hidden\" name=\"titre\" value=\"".stripslashes($_GET["titre"])."\" />
	   <input type=\"hidden\" name=\"horaire\" value=\"".stripslashes($_GET["horaire"])."\" />

  </fieldset>
  
    	<p>
  		<input type=\"submit\" value=\"Reserver\" />
  	</p>
  
</form>");

		}////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		elseif((isset($_GET["nomcine"]) && $_GET["nomcine"] != NULL && (isset($_GET["titre"]) && $_GET["titre"] != NULL))) {
		//si on a le cine et le titre mais pas les horaires
		require "util.php";
		$resultats_requete = executer_requete("select seance.heure, salle.numsalle, salle.prix from salle,seance where salle.titre= '".$_GET["titre"]."' AND salle.numsalle=seance.numsalle AND salle.nomcine=seance.nomcine AND seance.nomcine='".$_GET["nomcine"]."' ORDER BY heure");
		$num = pg_num_rows($resultats_requete);
		echo("<p>Film : ".stripslashes($_GET["titre"])."<br />
Cinema : ".$_GET["nomcine"]."</p>
<form method=\"get\" action=\"billetterie.php\">
   <p>
       <select name=\"horaire\" id=\"titre\">
           <option value=\"\">-Selectionnez votre horaire-</option>");

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				  echo ("<option value=\"@".$ligne_resultat->heure."@".$ligne_resultat->numsalle."@\">Salle : ".$ligne_resultat->numsalle." => ".str_replace(".","h",$ligne_resultat->heure)."</option>");
				}
       echo("</select>
	   <input type=\"hidden\" name=\"nomcine\" value=\"".$_GET["nomcine"]."\" />
	   <input type=\"hidden\" name=\"titre\" value=\"".stripslashes($_GET["titre"])."\" />
<input type=\"submit\" value=\"Valider\" />
   </p>
</form>");
		}////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		elseif((isset($_GET["titre"]) && $_GET["titre"] != NULL)) {
		//si on a que le titre en info
		require "util.php";
		$resultats_requete = executer_requete("select * from salle where titre= '".$_GET["titre"]."'");
		$num = pg_num_rows($resultats_requete);
		echo("<p>Film : ".stripslashes($_GET["titre"])."</p>
<form method=\"get\" action=\"billetterie.php\">
   <p>
       <select name=\"nomcine\" id=\"titre\">
           <option value=\"\">-Selectionnez votre cinema-</option>");

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				  echo ("<option value=\"".$ligne_resultat->nomcine."\">".$ligne_resultat->nomcine."</option>");
				}
       echo("</select>
	   <input type=\"hidden\" name=\"titre\" value=\"".stripslashes($_GET["titre"])."\" />
<input type=\"submit\" value=\"Valider\" />
   </p>
</form>");
		}////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else
		{
		//si on a aucune infos
		require "util.php";
		$resultats_requete = executer_requete("select * from film");
		$num = pg_num_rows($resultats_requete);
		
		echo("<p>Bienvenue sur la page de notre nouveau service de réservation en ligne<br />
		simple et rapide, grace a notre billetterie vous sauve des files d'attentes interminables<br /><br /></p>");
		echo("
<form method=\"get\" action=\"billetterie.php\">
   <p>
       <select name=\"titre\" id=\"nomcine\">
				           <option value=\"\">-Selectionnez votre film-</option>");

				for($i=0; $i<$num; $i++)
				{
				  $ligne_resultat = pg_fetch_object($resultats_requete);
				  echo ("<option value=\"".$ligne_resultat->titre."\">".$ligne_resultat->titre."</option>");
				}
       echo("</select>
<input type=\"submit\" value=\"Valider\" />
   </p>
</form>");

		}
			
		echo("</div>");
		
?>