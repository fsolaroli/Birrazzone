<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "User-notifications";
	$templateParams["Javascript"] = array("UserProfile/userProfileAside.js");
	$templateParams["Template"] = "UserProfile/userNotificationsTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>