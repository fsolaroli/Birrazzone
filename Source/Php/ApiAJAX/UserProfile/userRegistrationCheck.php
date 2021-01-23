<?php

require_once("../../Site/baseConfiguration.php");

if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["pw"]) && isset($_POST["confirmpw"]) && isset($_POST["confirmage"])) {
	$errors = null;

	if(!checkEmailValidity($_POST["email"])) {
		$errors[0] = "Attenzione: formato e-mail sbagliato o e-mail già utilizzata";
	}

	if(!checkPasswordValidity($_POST["pw"])) {
		$errors[1] = "Attenzione: la password è troppo corta";
	}

	if(strcmp($_POST["pw"], $_POST["confirmpw"]) !== 0) {
		$errors[2] = "Attenzione: la password non è stata confermata correttamente";
	}

	if(strcmp($_POST["confirmage"], "confirm-adult-age") !== 0) {
		$errors[3] = "Attenzione: devi confermare di essere maggiorenne per poterti registrare";
	}

	if(!isset($errors)) {
		$dbh->registerUser($_POST["name"], $_POST["email"], $_POST["pw"]);
		$user = $dbh->checkUserLogin($_POST["email"], $_POST["pw"]);
		registerLoggedUser($user[0]["IdUtente"]);
	}

	echo json_encode($errors);
}