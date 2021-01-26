<?php

require_once("../../Site/baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}

if(isUserLoggedIn()) {
	$dbh->deleteUser($_SESSION["userId"]);
	logOut();
}

?>