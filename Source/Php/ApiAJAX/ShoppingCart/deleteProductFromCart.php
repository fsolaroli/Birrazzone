<?php

require_once("../../Site/baseConfiguration.php");

if (isset($_POST["IdProduct"]) && isUserLoggedIn()) {
	$dbh->removeBeerFromShoppingCart($_SESSION["userId"],$_POST["IdProduct"]);
}else if(!isUserLoggedIn()){
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}

?>