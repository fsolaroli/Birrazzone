<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "Utente - Modifica indirizzo di fatturazione";
	$templateParams["Javascript"] = array("UserProfile/userProfileAside.js", "UserProfile/modifyUserAddress.js");
	$templateParams["Template"] = "UserProfile/modifyUserAddressTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>