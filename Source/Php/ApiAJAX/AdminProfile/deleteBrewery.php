<?php

require_once("../../Site/baseConfiguration.php");

if(isAdminLoggedIn()) {
	$dbh->deleteSeller($_SESSION["IdBirra"]);
}

?>