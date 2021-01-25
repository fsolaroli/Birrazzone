<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "Utente - Ordine";
	$templateParams["Javascript"] = array("UserProfile/userProfileAside.js", "UserProfile/userSelectedOrder.js");
	$templateParams["Template"] = "UserProfile/userSelectedOrderTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>