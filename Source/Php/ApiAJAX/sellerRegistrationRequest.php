<?php

require_once("../Site/baseConfiguration.php");

if (isset($_POST["ragioneSociale"]) && isset($_POST["email"]) && isset($_POST["IVA"])) {
	if(!checkEmailValidity($_POST["email"])) {
		$errors["email"] = "EMAIL ERRATA O GIÀ UTILIZZATA";
	}
	if(!checkIVAValidity($_POST["IVA"])) {
		$errors["IVA"] = "IVA ERRATA O GIÀ UTILIZZATA";
	}
	
	if(!isset($errors)) {
		$dbh->requestSellerAccount($_POST["ragioneSociale"], $_POST["email"], $_POST["IVA"]);
		echo json_encode(null);
	} else {
		echo json_encode($errors);
	}
}

?>