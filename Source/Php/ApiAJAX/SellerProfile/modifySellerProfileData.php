<?php

require_once("../../Site/baseConfiguration.php");

if (isSellerLoggedIn()) {
	if (isset($_POST["location"]) && isset($_POST["imagePath"]) && isset($_POST["description"])) {
		
		if(!checkNameValidity($_POST["location"])) {
			$errors[3] = "IL CAMPO 'NOME' DEVE ESSERE LUNGO MASSIMO 30 CARATTERI";
		}

		if(basename($_POST["imagePath"]) == "Collapse.png" || $_POST["imagePath"] == "") {
			$errors[] = "INSERIRE UN'IMMAGINE";
		}
	
		if(strlen($_POST["description"]) > 300) {
			$errors["descriptionLenght"] = "DESCRIZIONE TROPPO LUNGA";
		}

		if(empty($errors)) {
			$dbh->updateSellerData($_SESSION["sellerId"], $_POST["location"], basename($_POST["imagePath"]), $_POST["description"]);
			echo json_encode(null);
		} else {
			echo json_encode($errors);
		}
	}
} else {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come birrificio per poter compiere questa operazione");
}

?>