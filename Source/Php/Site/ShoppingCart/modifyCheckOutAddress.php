<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "Utente - CheckOut";
	$templateParams["Template"] = "ShoppingCart/modifyCheckOutAddressTemplate.php";
	$templateParams["Javascript"] = array("CheckOut/modifyCheckOutAddress.js");
	$templateParams["HeaderType"] = "Global";

	require("../../Template/baseTemplate.php");
}

?>