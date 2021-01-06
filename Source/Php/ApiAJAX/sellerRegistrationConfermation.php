<?php

require_once("../Site/baseConfiguration.php");

if (isset($_POST["sellerId"]) && isset($_POST["password"]) && isset($_POST["passwordConfermation"])) {
	if(!checkPasswordValidity($_POST["password"])) {
		$errors["passwordComposition"] = "LA PASSWORD DEVE ESSERE LUNGA ALMENO 8 CARATTERI";
	}
	if($_POST["password"] != $_POST["passwordConfermation"]) {
		$errors["passwordConfermation"] = "LE DUE PASSWORD NON CORRISPONDONO";
	}
	
	if(!isset($errors)) {
		$dbh->completeSellerRegistration($_POST["sellerId"], $_POST["password"]);
		registerLoggedSeller($_POST["sellerId"]);
		echo json_encode(null);
	} else {
		echo json_encode($errors);
	}
}

?>