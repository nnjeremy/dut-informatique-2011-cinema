		<div id="sidebar">
			<div class="roundcornertop"><img src="images/bg/bgRoundCornerTopLeft.gif" alt="" /></div>
			<div class="rounded">
			<h3>Sorties de la semaine</h3>
			
<?php
function lit_rss($fichier,$objets) {

	// on lit tout le fichier
	if($chaine = @implode("",@file($fichier))) {

		// on d�coupe la chaine obtenue en items
		$tmp = preg_split("/<\/?"."item".">/",$chaine);

		// pour chaque item
		for($i=1;$i<sizeof($tmp)-1;$i+=2)

			// on lit chaque objet de l'item
			foreach($objets as $objet) {

				// on d�coupe la chaine pour obtenir le contenu de l'objet
				$tmp2 = preg_split("/<\/?".$objet.">/",$tmp[$i]);

				// on ajoute le contenu de l'objet au tableau resultat
				$resultat[$i-1][] = @$tmp2[1];
			}

		// on retourne le tableau resultat
		return $resultat;
	}
}
//////////////////////
$rss = lit_rss("http://rss.allocine.fr/ac/cine/cettesemaine",array("title","link","description","pubDate"));
//////////////////////

$cpt = 0;
foreach($rss as $tab) {
    if ($cpt < 4){ echo '<div class="post-date"><span class="post-month">'.substr($tab[3],7,4).'</span> <span class="post-day">'.substr($tab[3],5,2).'</span></div> <p><a href="'.$tab[1].'" onclick="window.open(this.href); return false;">'.utf8_encode($tab[0]).'</a><br /></p>';} $cpt++;
}

?>
				
				Source : allocine
			</div>
			<div class="roundcornerbottom"><img src="images/bg/bgRoundCornerBottomLeft.gif" alt="" /></div>
			<a href="map.php?recherche=<?php if(isset($_GET["nomcine"]) && $_GET["nomcine"] != NULL) {echo rawurlencode($_GET["nomcine"]." Cinema");}else {echo rawurlencode("pasdenom");}?>" title="la carte"><img src="images/boussole.jpg" alt="la carte" /></a>
			<a href="billetterie.php" title="billet"><img src="images/billet.jpg" alt="billet" /></a>
		</div>
		<div class="clearfix"></div>
		</div>