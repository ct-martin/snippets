<?php
// This is an index.php file for having a simple, file-based CMS
// Pages are stored in pages/ but you can also add subfolders in the array in the first foreach loop
// This is not meant for huge sites, it's meant to be simple. Pages are "whitelist" to simplify validating
// Requires parts.php; Header and footer should be in inc/ and named header.php and footer.php
$pages = array();
foreach(array("", "projects", "other") as $foldir) {
	$pgfiles = array_diff(scandir("pages/" . ($foldir == "" ? "" : $foldir . "/")), array('..', '.'));
	foreach($pgfiles as $page) {
		if(strlen($page) >= 5 && substr($page, -4) == ".php") {
			array_push($pages, ($foldir == "" ? "" : $foldir . "/") . substr($page, 0, -4));
		}
	}
}
$req = (isset($_GET['page']) ? rtrim($_GET['page'], '/') : 'home');
if(!in_array($req, $pages)) {
	$req = '404';
}
require('inc/parts.php');
require('inc/header.php');
require('pages/' . $req . '.php');
require('inc/footer.php');
?>
