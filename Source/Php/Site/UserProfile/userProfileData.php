<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "Utente - Dati personali";
	$templateParams["Javascript"] = array("UserProfile/userProfileAside.js", "UserProfile/deleteUser.js");
	$templateParams["Template"] = "UserProfile/userProfileDataTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>