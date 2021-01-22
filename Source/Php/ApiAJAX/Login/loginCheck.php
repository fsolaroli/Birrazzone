<?php

require_once("../../Site/baseConfiguration.php");

if(isset($_POST["email"]) && isset($_POST["pw"])) {
	global $dbh;
	$possibleSeller = $dbh->checkSellerLogin($_POST["email"], $_POST["pw"]);
	$possibleUser = $dbh->checkUserLogin($_POST["email"], $_POST["pw"]);

	if(!empty($possibleSeller) || !empty($possibleUser)) {
		$error = null;

		if(!empty($possibleSeller)) {
			registerLoggedSeller($possibleSeller[0]);
		} else {
			registerLoggedUser($possibleUser[0]);
		}
	} else {
		$error = true;
	}

	echo json_encode($error);
}

?>