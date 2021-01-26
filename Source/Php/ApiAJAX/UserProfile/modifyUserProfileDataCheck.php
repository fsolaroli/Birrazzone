<?php

require_once("../../Site/baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}

if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["pw"]) && isset($_POST["confirmpw"])) {
	$userInfo=$dbh->getUser($_SESSION["userId"]);
	$errors = null;

	if(!checkEmailValidity($_POST["email"]) && strcmp($_POST["email"], $userInfo[0]["EmailUtente"]) !== 0) {
		$errors[0] = "FORMATO E-MAIL SBAGLIATO O E-MAIL GIÀ UTILIZZATA";
	}

	if(!checkPasswordValidity($_POST["pw"])) {
		$errors[1] = "LA PASSWORD DEVE ESSERE COMPRESA FRA 8 E 32 CARATTERI";
	}

	if(strcmp($_POST["pw"], $_POST["confirmpw"]) !== 0) {
		$errors[2] = "LA PASSWORD NON È STATA CONFERMATA CORRETTAMENTE";
	}

	if(!checkNameValidity($_POST["name"])) {
		$errors[3] = "IL CAMPO 'NOME' DEVE ESSERE LUNGO MASSIMO 30 CARATTERI";
	}

	if(!isset($errors)) {
		$dbh->updateUserData($userInfo[0]["IdUtente"], $_POST["name"], $_POST["email"], $_POST["pw"]);
	}

	echo json_encode($errors);
}