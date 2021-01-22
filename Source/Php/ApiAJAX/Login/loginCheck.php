<?php

require_once("../../Site/baseConfiguration.php");

if(isset($_POST["email"]) && isset($_POST["pw"])) {
	global $dbh;
	if(!$dbh->checkSellerLogin($_POST["email"], $_POST["pw"]) && !$dbh->checkUserLogin($_POST["email"], $_POST["pw"])) {
		$error = true;
	} else {
		$error = null;
	}
}

?>