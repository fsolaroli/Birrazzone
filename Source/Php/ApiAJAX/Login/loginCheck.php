<?php

require_once("../../Site/baseConfiguration.php");

if(isset($_POST["email"]) && isset($_POST["pw"])) {
	$possibleSeller = $dbh->checkSellerLogin($_POST["email"], $_POST["pw"]);
	$possibleUser = $dbh->checkUserLogin($_POST["email"], $_POST["pw"]);
	$nextPage = null;
	$accountType = null;
	$errors = null;
	var_dump($_POST["loginFromChart"]);

	if(!empty($possibleSeller) || !empty($possibleUser)) {

		if(!empty($possibleSeller)) {
			registerLoggedSeller($possibleSeller[0]["IdBirrificio"]);
			$accountType = "s";
		} else if(!empty($possibleUser) && $_POST["loginFromCart"] == true) {
			registerLoggedUser($possibleUser[0]["IdUtente"]);
			$accountType = "u";
			$nextPage = "cart";
		}else {
			registerLoggedUser($possibleUser[0]["IdUtente"]);
			$accountType = "u";
			$nextPage = "profile";
		}
	} else {
		$errors = true;
	}

	$data = array($errors, $accountType, $nextPage);
	echo json_encode($data);
}

?>