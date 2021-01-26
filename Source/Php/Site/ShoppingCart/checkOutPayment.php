<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "Utente - CheckOut";
	$templateParams["Template"] = "ShoppingCart/checkOutPaymentTemplate.php";
	$templateParams["Javascript"] = array("CheckOut/setCheckOutPayment.js");
	$templateParams["HeaderType"] = "Global";

	require("../../Template/baseTemplate.php");
}

?>