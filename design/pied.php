<?php
$rss2 = lit_rss("http://rss.allocine.fr/ac/cine/topspectateurs",array("title","link","description","pubDate"));
$rss3 = lit_rss("http://rss.allocine.fr/ac/series/top",array("title","link","description","pubDate"));
$rss1 = lit_rss("http://rss.allocine.fr/ac/cine/prochainement",array("title","link","description","pubDate"));
$rss4 = lit_rss("http://rss.allocine.fr/ac/cine/boxoffice/france",array("title","link","description","pubDate"));
?>

	<div id="footer">
		<div class="list">
			<h4>Prochainement</h4>

			<ul>
<?php 
$cpt = 0;
foreach($rss1 as $tab) {
  if ($cpt < 5){echo '<li><a href="'.utf8_encode($tab[1]).'" onclick="window.open(this.href); return false;">'.utf8_encode($tab[0]).'</a></li>';} $cpt++;
}
?>
			</ul>
		</div>
		<div class="list">
			<h4>Top Films</h4>
			<ul>
<?php
$cpt = 0;
foreach($rss2 as $tab) {
  if ($cpt < 5){echo '<li><a href="'.utf8_encode($tab[1]).'" onclick="window.open(this.href); return false;">'.utf8_encode($tab[0]).'</a></li>';} $cpt++;
}
?>
			</ul>
		</div>
		<div class="list">
			<h4>Top Series</h4>
			<ul>
<?php
$cpt = 0;
foreach($rss3 as $tab) {
  if ($cpt < 5){echo '<li><a href="'.utf8_encode($tab[1]).'" onclick="window.open(this.href); return false;">'.utf8_encode($tab[0]).'</a></li>';} $cpt++;
}
?>
			</ul>
		</div>
		<div class="list">
			<h4>Box Office</h4>
			<ul>
<?php
$cpt = 0;
foreach($rss4 as $tab) {
  if ($cpt < 5){echo '<li><a href="'.utf8_encode($tab[1]).'" onclick="window.open(this.href); return false;">'.utf8_encode($tab[0]).'</a></li>';} $cpt++;
}
?>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
	<div id="credith"><a href="http://www.gabfire.com" onclick="window.open(this.href); return false;">Design by Gabfire</a> | <a href="#">Adaptation Jeremy.N</a> | Courtesy <a href="http://www.openwebdesign.org" onclick="window.open(this.href); return false;">Open Web Design</a>, Thanks to <a href="http://www.lessnau.com/2009/09/godaddy-hosting-code/" onclick="window.open(this.href); return false;">Godaddy Source Codes</a> |  <a href="http://transit.iut2.upmf-grenoble.fr/cgi-bin/wdg-html-validator.pl?url=referer&amp;spider=yes" onclick="window.open(this.href); return false;">Validation</a> | <a href="http://validator.w3.org/check?uri=referer" onclick="window.open(this.href); return false;"><img
        src="http://www.w3.org/Icons/valid-xhtml10"
        alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a> | <a href="http://jigsaw.w3.org/css-validator/check/referer" onclick="window.open(this.href); return false;">
        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />
    </a></div>