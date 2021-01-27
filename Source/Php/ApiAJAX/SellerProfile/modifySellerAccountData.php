<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	if (isset($_POST["sellerName"]) && isset($_POST["email"]) && isset($_POST["IVA"])) {

		if(!checkNameValidity($_POST["sellerName"])) {
			$errors[3] = "LA RAGIONE SOCIALE DEVE ESSERE LUNGO MASSIMO 30 CARATTERI";
		}	
		if(!checkEmailValidity($_POST["email"], null, $_SESSION["sellerId"])) {
			$errors["email"] = "EMAIL ERRATA O GIÀ UTILIZZATA";
		}
		if(!checkIVAValidity($_POST["IVA"], $_SESSION["sellerId"])) {
			$errors["IVA"] = "IVA ERRATA O GIÀ UTILIZZATA";
		}
	
		if(!isset($errors)) {
			$dbh->updateSellerAccountData($_SESSION["sellerId"], $_POST["sellerName"], $_POST["email"], $_POST["IVA"]);
			echo json_encode(null);
		} else {
			echo json_encode($errors);
		}
	}
} else {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come birrificio per poter compiere questa operazione");
}

?>