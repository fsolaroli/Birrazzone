<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["IdProduct"]) && isUserLoggedIn()) {
		$dbh->addBeerToShoppingCart($_SESSION["userId"],$_POST["IdProduct"],$_POST["Quantity"]);
}else if(!isUserLoggedIn()){
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}
?>