<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	if (isset($_POST["sellerName"]) && isset($_POST["email"]) && isset($_POST["IVA"]) && isset($_POST["password"]) && isset($_POST["passwordConfermation"])) {
		if(!checkEmailValidity($_POST["email"], null, $_SESSION["sellerId"])) {
			$errors["email"] = "EMAIL ERRATA O GIÀ UTILIZZATA";
		}
		if(!checkIVAValidity($_POST["IVA"], $_SESSION["sellerId"])) {
			$errors["IVA"] = "IVA ERRATA O GIÀ UTILIZZATA";
		}
		if(!checkPasswordValidity($_POST["password"])) {
			$errors["passwordComposition"] = "LA PASSWORD DEVE ESSERE LUNGA ALMENO 8 CARATTERI";
		}
		if($_POST["password"] != $_POST["passwordConfermation"]) {
			$errors["passwordConfermation"] = "LE DUE PASSWORD NON CORRISPONDONO";
		}
		
		if(!isset($errors)) {
			$dbh->updateSellerAccountData($_SESSION["sellerId"], $_POST["sellerName"], $_POST["email"], $_POST["IVA"], $_POST["password"]);
			echo json_encode(null);
		} else {
			echo json_encode($errors);
		}
	}
} else {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage='È necessario essere loggato come birrificio per poter compiere questa operazione'");
}

?>