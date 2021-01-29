<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Login/login.php");
} else if (!isset($_GET["orderId"]) || empty($dbh->getOrder($_GET["orderId"]))) {
	header("Location: ../../Site/Errors/errors.php?errorType=404&errorMessage=Ordine inesistente");
} else {
	$templateParams["Titolo"] = "Utente - Ordine";
	$templateParams["Javascript"] = array("UserProfile/userProfilenav.js", "UserProfile/userSelectedOrder.js");
	$templateParams["Template"] = "UserProfile/userSelectedOrderTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>