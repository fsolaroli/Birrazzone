<?php

require_once("../../Site/baseConfiguration.php");

if(!isAdminLoggedIn()) {
	header("Location: ../../Site/Errors/errors.php?errorType=401&errorMessage=È necessario essere loggato come utente per poter compiere questa operazione");
}

adminLogOut();

header("Location: ../../Site/Home/home.php");

?>