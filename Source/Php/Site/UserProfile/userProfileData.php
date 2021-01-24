<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "User-profileData";
	$templateParams["Javascript"] = array("UserProfile/userProfileAside.js", "UserProfile/deleteUser.js");
	$templateParams["Template"] = "UserProfile/userProfileDataTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>