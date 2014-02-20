<?php
function affichemenu($active)
{
	echo "<div id=\"navigasyon-wrap\">
		<ul>
			<li "; if ($active==1){echo"class=\"active\"";} echo"><a href=\"index.php\">accueil</a></li>
			<li "; if ($active==2){echo"class=\"active\"";} echo"><a href=\"cinema.php\">Cinémas</a></li>
			<li "; if ($active==3){echo"class=\"active\"";} echo"><a href=\"film.php\">Films</a></li>
			<li "; if ($active==4){echo"class=\"active\"";} echo"><a href=\"acteur.php\">Acteurs</a></li>
			<li "; if ($active==5){echo"class=\"active\"";} echo"><a href=\"realisateur.php\">Réalisateur</a></li>
		</ul><div class=\"clearfix\"></div>
	</div>";
}
?>