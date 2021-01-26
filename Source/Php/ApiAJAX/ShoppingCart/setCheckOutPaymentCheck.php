<?php

require_once("../../Site/baseConfiguration.php");

if(isset($_POST["nometitolare"]) && isset($_POST["numerocarta"]) && isset($_POST["cvv"]) && isset($_POST["scadenza"])) {
	$errors = null;

	if(strlen($_POST["nometitolare"]) > 40) {
		$errors[0] = "IL CAMPO 'NOME TITOLARE CARTA' DEVE ESSERE LUNGO AL MASSIMO 40 CARATTERI";
	}

	if(strlen($_POST["numerocarta"]) != 16) {
		$errors[3] = "IL CAMPO 'NUMERO CARTA' DEVE ESSERE LUNGO 16 CIFRE";
	}

	if(!is_numeric($_POST["numerocarta"])) {
		$errors[4] = "IL CAMPO 'NUMERO CARTA' DEVE CONTENERE SOLO NUMERI";
	}

	if(strlen($_POST["cvv"]) != 3) {
		$errors[3] = "IL CAMPO 'CVV' DEVE ESSERE LUNGO 3 CIFRE";
	}

	if(!is_numeric($_POST["cvv"])) {
		$errors[4] = "IL CAMPO 'CVV' DEVE CONTENERE SOLO NUMERI";
	}

	if(!isset($errors)) {
		$_SESSION["NomeTitolare"] = $_POST["nometitolare"];
		$_SESSION["NumeroCarta"] = $_POST["numerocarta"];
		$_SESSION["Scadenza"] = $_POST["scadenza"];
		$_SESSION["CVV"] = $_POST["cvv"];
	}

	echo json_encode($errors);
}