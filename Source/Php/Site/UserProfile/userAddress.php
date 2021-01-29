<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "Utente - Indirizzo di fatturazione";
	$templateParams["Javascript"] = array("UserProfile/userProfilenav.js", "UserProfile/deleteAddress.js");
	$templateParams["Template"] = "UserProfile/userAddressTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>