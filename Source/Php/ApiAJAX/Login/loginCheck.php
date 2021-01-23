<?php

require_once("../../Site/baseConfiguration.php");

if(isset($_POST["email"]) && isset($_POST["pw"])) {
	$possibleSeller = $dbh->checkSellerLogin($_POST["email"], $_POST["pw"]);
	$possibleUser = $dbh->checkUserLogin($_POST["email"], $_POST["pw"]);
	$accountType = null;
	$errors = null;

	if(!empty($possibleSeller) || !empty($possibleUser)) {

		if(!empty($possibleSeller)) {
			registerLoggedSeller($possibleSeller[0]["IdBirrificio"]);
			$accountType = "s";
		} else {
			registerLoggedUser($possibleUser[0]["IdUtente"]);
			$accountType = "u";
		}
	} else {
		$errors = true;
	}

	$data = array($errors, $accountType);
	echo json_encode($data);
}

?>