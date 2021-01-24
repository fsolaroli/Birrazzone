<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "Utente - Notifiche";
	$templateParams["Javascript"] = array("UserProfile/userProfileAside.js", "UserProfile/userNotification.js");
	$templateParams["Template"] = "UserProfile/userNotificationsTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>