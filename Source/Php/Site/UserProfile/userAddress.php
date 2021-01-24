<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "User-address";
	$templateParams["Javascript"] = array("UserProfile/userProfileAside.js", "UserProfile/deleteAddress.js");
	$templateParams["Template"] = "UserProfile/userAddressTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>