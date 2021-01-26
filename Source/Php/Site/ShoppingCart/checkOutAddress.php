<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "Utente - CheckOut";
	$templateParams["Template"] = "ShoppingCart/checkOutAddressTemplate.php";
	$templateParams["Javascript"] = array("CheckOut/checkOutAddress.js");
	$templateParams["HeaderType"] = "Global";

	$user = $dbh->getUser($_SESSION["userId"])[0];
	$address = $dbh->getAddress($user["IdIndirizzo"])[0];

	require("../../Template/baseTemplate.php");
}

?>