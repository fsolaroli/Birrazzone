<?php

require_once("../../Site/baseConfiguration.php");

if(isset($_POST["email"]) && isset($_POST["pw"])) {
	$possibleSeller = $dbh->checkSellerLogin($_POST["email"], $_POST["pw"]);
	$possibleUser = $dbh->checkUserLogin($_POST["email"], $_POST["pw"]);
	$nextPage = null;
	$accountType = null;
	$errors = null;

	if(!empty($possibleSeller) || !empty($possibleUser)) {

		if(!empty($possibleSeller)) {
			registerLoggedSeller($possibleSeller[0]["IdBirrificio"]);
			$accountType = "s";
		} else if(!empty($possibleUser)) {
			registerLoggedUser($possibleUser[0]["IdUtente"]);
			$accountType = "u";
			if ($_POST["loginFromCart"] == "true") {
				$nextPage = "cart";
			} else {
				$nextPage = "profile";
			}
		}
	} else {
		$errors = true;
	}

	$data = array($errors, $accountType, $nextPage);
	echo json_encode($data);
}

?>