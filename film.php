	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Les Films</title>
		<meta name="description" content="Liste des films de Grenoble" /> 
		<style type="text/css">
		@import url(css/reset.css);
		@import url(css/list.css);
		@import url(css/general.css);
				#search {width:230px; float:left; background: url(images/bg/bgsearch.gif) no-repeat top right; height:60px}
				#searchform {margin:5px 0 0 15px;}	
				input {background: #eee; border:1px solid #8f8f8f}
				#searchsubmit {background:#7ac4ea; color:#2a2a2a; width:40px}
		</style>
	</head>

	<body>




<?php require_once("design/tete.php"); 
require_once("design/menu.php"); 
affichemenu(3);
require_once("pages/film.inc.php"); 
require_once("design/menu2.php"); 
require_once("design/pied.php"); ?>




	</body>
	</html>