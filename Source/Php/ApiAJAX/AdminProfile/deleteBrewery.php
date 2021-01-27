<?php

require_once("../../Site/baseConfiguration.php");

if(isAdminLoggedIn()) {
	$dbh->deleteSeller($_SESSION["IdBirra"]);
} else {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}

?>