<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "Utente - Storico ordini";
	$templateParams["Javascript"] = array("UserProfile/userProfilenav.js", "UserProfile/userOrdersRedirect.js");
	$templateParams["Template"] = "UserProfile/userOrdersTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>