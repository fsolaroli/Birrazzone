<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "Utente - CheckOut";
	$templateParams["Template"] = "ShoppingCart/orderConcludedTemplate.php";
	$templateParams["Javascript"] = array("CheckOut/backToCart.js");
	$templateParams["HeaderType"] = "Global";
	
	require("../../Template/baseTemplate.php");
}

?>