<?php

require_once("../../Site/baseConfiguration.php");

if(isUserLoggedIn() || isSellerLoggedIn()) {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}

if(isset($_POST["email"]) && isset($_POST["pw"])) {
	$possibleSeller = $dbh->checkSellerLogin($_POST["email"], $_POST["pw"]);
	$possibleUser = $dbh->checkUserLogin($_POST["email"], $_POST["pw"]);
	$errors = null;
	$accountType = null;
	$nextPage = null;
	$productId = null;
	$quantity = null;

	if(!empty($possibleSeller) || !empty($possibleUser)) {
		if(!empty($possibleSeller)) {
			registerLoggedSeller($possibleSeller[0]["IdBirrificio"]);
			$accountType = "s";
		} else if(!empty($possibleUser)) {
			registerLoggedUser($possibleUser[0]["IdUtente"]);
			$accountType = "u";
			if ($_POST["login"] != null) {
				$nextPage = $_POST["login"];
				$productId = $_POST["productId"];
				$quantity = $_POST["quantity"];
			} else {
				$nextPage = "profile";
			}
		}
	} else {
		$errors = true;
	}

	$data = array($errors, $accountType, $nextPage, $productId, $quantity);
	echo json_encode($data);
}

?>