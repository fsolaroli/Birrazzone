<?php

require_once("../../Site/baseConfiguration.php");

if(isUserLoggedIn()) {
	$dbh->deleteUser($_SESSION["userId"]);
	logOut();
}

?>