<?php

require_once("../../Site/baseConfiguration.php");

if(isAdminLoggedIn()) {
	$dbh->deleteBrewery($_SESSION["sellerId"]);
	logOut();
}

?>