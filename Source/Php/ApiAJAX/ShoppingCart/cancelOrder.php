<?php

require_once("../../Site/baseConfiguration.php");
if(!isUserLoggedIn()) {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
} else {
	$_SESSION["addressId"] = null;
	$_SESSION["Scadenza"] = null;	
	$_SESSION["NomeTitolare"] = null;
	$_SESSION["CVV"] = null;
	$_SESSION["NumeroCarta"] = null;
	$_SESSION["PrezzoCarrello"] = null;
}
?>