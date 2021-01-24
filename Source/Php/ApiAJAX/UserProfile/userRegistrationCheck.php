<?php

require_once("../../Site/baseConfiguration.php");

if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["pw"]) && isset($_POST["confirmpw"])) {
	$errors = null;

	if(!checkEmailValidity($_POST["email"])) {
		$errors[0] = "FORMATO E-MAIL SBAGLIATO O E-MAIL GIÀ UTILIZZATA";
	}

	if(!checkPasswordValidity($_POST["pw"])) {
		$errors[1] = "LA PASSWORD È TROPPO CORTA";
	}

	if(strcmp($_POST["pw"], $_POST["confirmpw"]) !== 0) {
		$errors[2] = "LA PASSWORD NON È STATA CONFERMATA CORRETTAMENTE";
	}

	if(!isset($_POST["confirmage"]) || $_POST["confirmage"] != "confirm-adult-age") {
		$errors[3] = "DEVI CONFERMARE DI ESSERE MAGGIORENNE PER POTERTI REGISTRARE";
	}

	if(!isset($errors)) {
		$dbh->registerUser($_POST["name"], $_POST["email"], $_POST["pw"]);
		$user = $dbh->checkUserLogin($_POST["email"], $_POST["pw"]);
		registerLoggedUser($user[0]["IdUtente"]);
	}

	echo json_encode($errors);
}