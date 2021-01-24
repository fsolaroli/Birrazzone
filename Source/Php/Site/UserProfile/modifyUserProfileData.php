<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "Utente - Modifica dati personali";
	$templateParams["Javascript"] = array("UserProfile/userProfileAside.js", "UserProfile/modifyUserProfileData.js");
	$templateParams["Template"] = "UserProfile/modifyUserProfileDataTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>