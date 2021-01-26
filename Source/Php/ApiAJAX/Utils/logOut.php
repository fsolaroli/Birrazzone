<?php

require_once("../../Site/baseConfiguration.php");

if(!isUserLoggedIn() || !isSellerLoggedIn()) {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}

logOut();

header("Location: ../../Site/Home/home.php");

?>