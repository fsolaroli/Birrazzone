<?php

require_once("../../Site/baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}

if(isset($_POST["pw"]) && isset($_POST["confirmpw"])) {
	$errors = null;

	if(!checkPasswordValidity($_POST["pw"])) {
		$errors[1] = "LA PASSWORD DEVE ESSERE COMPRESA FRA 8 E 32 CARATTERI";
	}

	if(strcmp($_POST["pw"], $_POST["confirmpw"]) !== 0) {
		$errors[2] = "LA PASSWORD NON È STATA CONFERMATA CORRETTAMENTE";
	}

	if(!isset($errors)) {
		$dbh->updateUserPassword($_SESSION["userId"], $_POST["pw"]);
	}

	echo json_encode($errors);
}