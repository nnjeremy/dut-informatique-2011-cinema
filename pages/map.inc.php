<?php

	echo ("<div id=\"wrap\">

		<img class=\"banner\" src=\"images/banner01.jpg\" alt=\"\" />
		<div id=\"content\">");


echo("
<form method=\"get\" action=\"map.php\">
   <p>
       <select name=\"recherche\" id=\"pays\">
           <option value=\"pasdenom\">-Selectionnez votre cinema-</option>
           <option value=\"Le Club Cinema\">Le Club</option>
           <option value=\"Pathé Cinema\">Pathé</option>
           <option value=\"La Nef Cinema\">La Nef</option>
           <option value=\"Le Meliès Cinema\">Le Meliès</option>
       </select>
<input type=\"submit\" value=\"Rechercher\" />
   </p>
</form>");

		
if (isset($_GET["recherche"]) && $_GET["recherche"] != NULL) {$manrecherche = $_GET["recherche"];} else {$manrecherche = "";}
$manrecherche = str_replace("%20","+",str_replace("Path%C3%A9","europalaces",rawurlencode($manrecherche)));

		echo("<h1>Recherche : ".str_replace("%20"," ",str_replace("%C3%A8","è",str_replace("europalaces","Pathé",str_replace("pasdenom","***",str_replace("+"," ",$manrecherche)))))."</h1>");

		echo("<br /><iframe id=\"googlemap\" src=\"http://maps.google.fr/maps?f=q&amp;source=s_q&amp;hl=fr&amp;geocode=&amp;q=".$manrecherche."+grenoble&amp;sll=46.75984,1.738281&amp;sspn=10.660084,28.366699&amp;ie=UTF8&amp;hq=".$manrecherche."&amp;hnear=Grenoble&amp;ll=45.185513,5.731145&amp;spn=0.01928,0.006295&amp;output=embed\"></iframe>

		<br /><br />--> page en XHTML 1.0 Transitional pour l'utilisation de l'iframe");




			
	echo "</div>";
?>