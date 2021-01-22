<?php

require_once("../../Site/baseConfiguration.php");

if(isset($_POST["email"]) && isset($_POST["pw"])) {
	global $dbh;
	$possibleSeller = $dbh->checkSellerLogin($_POST["email"], $_POST["pw"]);
	$possibleUser = $dbh->checkUserLogin($_POST["email"], $_POST["pw"]);

	if(!empty($possibleSeller) || !empty($possibleUser)) {
		$error = null;

		if(!empty($possibleSeller)) {
			registerLoggedSeller($possibleSeller[0]["IdBirrificio"]);
			$accountType = "s";
		} else {
			registerLoggedUser($possibleUser[0]["IdUtente"]);
			$accountType = "u";
		}
	} else {
		$error = true;
	}

	$data = array($error, $accountType);
	echo json_encode($data);
}

?>