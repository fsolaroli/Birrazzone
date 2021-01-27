<?php

require_once("../../Site/baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}

if(isset($_POST["name"]) && isset($_POST["email"])) {
	$userInfo=$dbh->getUser($_SESSION["userId"]);
	$errors = null;

	if(!checkEmailValidity($_POST["email"]) && strcmp($_POST["email"], $userInfo[0]["EmailUtente"]) !== 0) {
		$errors[0] = "FORMATO E-MAIL SBAGLIATO O E-MAIL GIÀ UTILIZZATA";
	}

	if(!checkNameValidity($_POST["name"])) {
		$errors[3] = "IL CAMPO 'NOME' DEVE ESSERE LUNGO MASSIMO 30 CARATTERI";
	}

	if(!isset($errors)) {
		$dbh->updateUserData($userInfo[0]["IdUtente"], $_POST["name"], $_POST["email"]);
	}

	echo json_encode($errors);
}