<?php

require_once("../../Site/baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}

if(isset($_POST["via"]) && isset($_POST["citta"]) && isset($_POST["provincia"]) && isset($_POST["cap"])) {
	$errors = null;

	if(strlen($_POST["via"]) > 40 || strlen($_POST["via"]) == 0) {
		$errors[0] = "IL CAMPO 'VIA' DEVE ESSERE LUNGO AL MASSIMO 40 CARATTERI";
	}

	if(strlen($_POST["citta"]) > 30 || strlen($_POST["citta"]) == 0) {
		$errors[1] = "IL CAMPO 'CITTÀ' DEVE ESSERE LUNGO AL MASSIMO 30 CARATTERI";
	}

	if(strlen($_POST["provincia"]) > 20 || strlen($_POST["provincia"]) < 2) {
		$errors[2] = "IL CAMPO 'PROVINCIA' DEVE ESSERE LUNGO FRA 2 E 20 CARATTERI";
	}

	if(strlen($_POST["cap"]) != 5) {
		$errors[3] = "IL CAMPO 'CAP' DEVE ESSERE LUNGO 5 CARATTERI";
	}

	if(!is_numeric($_POST["cap"])) {
		$errors[4] = "IL CAMPO 'CAP' DEVE CONTENERE SOLO NUMERI";
	}

	if(!isset($errors)) {
		$_SESSION["addressId"] = null;
		$dbh->updateUserAddress($_SESSION["userId"], $_POST["via"], $_POST["citta"], $_POST["provincia"], $_POST["cap"]);
	}

	echo json_encode($errors);
}
?>