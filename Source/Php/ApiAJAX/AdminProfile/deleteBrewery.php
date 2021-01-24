<?php

require_once("../../Site/baseConfiguration.php");

if(isAdminLoggedIn()) {
	$dbh->deleteBrewery($_SESSION["IdBirra"]);
	logOut();
}

?>