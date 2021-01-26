<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	if (isset($_POST["name"]) && isset($_POST["type"]) && isset($_POST["imagePath"]) && isset($_POST["price"]) && isset($_POST["format"]) && isset($_POST["alcholic"]) && isset($_POST["color"]) && isset($_POST["description"])) {
		
		if(!checkNameValidity($_POST["name"])) {
			$errors[] = "NOME TROPPO LUNGO O MANCANTE";
		}

		if(!checkNameValidity($_POST["type"])) {
			$errors[] = "TIPOLOGIA TROPPA LUNGA O MANCANTE";
		}

		if($_POST["price"] <= 0 || $_POST["price"] > 9999.99) {
			$errors[] = "PREZZO TROPPO ALTO O INCORRETTO";
		}

		if($_POST["format"] <= 0 || $_POST["format"] > 16777215) {
			$errors[] = "FORMATO TROPPO ALTO O INCORRETTO";
		}
		
		if($_POST["alcholic"] <= 0 || $_POST["alcholic"] > 99.9) {
			$errors[] = "GRADO ALCOLICO TROPPO ALTO O INCORRETTO";
		}

		if(!checkNameValidity($_POST["color"])) {
			$errors[] = "COLORE TROPPO LUNGO O MANCANTE";
		}

		if(strlen($_POST["description"]) > 300) {
			$errors[] = "DESCRIZIONE TROPPO LUNGA";
		}

		if(empty($errors)) {
			$dbh->addBeer($_SESSION["sellerId"], $_POST["name"], $_POST["type"], basename($_POST["imagePath"]), $_POST["price"], $_POST["format"], $_POST["alcholic"], $_POST["color"], $_POST["description"]);
			echo json_encode(null);
		} else {
			echo json_encode($errors);
		}
	}
} else {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage='È necessario essere loggato come birrificio per poter compiere questa operazione'");
}

?>