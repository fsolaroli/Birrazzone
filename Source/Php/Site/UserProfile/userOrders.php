<?php

require_once("../baseConfiguration.php");

if(!isUserLoggedIn()) {
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "Storico ordini";
	$templateParams["Javascript"] = array("UserProfile/userProfileAside.js");
	$templateParams["Template"] = "UserProfile/userOrdersTemplate.php";
	$templateParams["HeaderType"] = "Profile";

	require("../../Template/baseTemplate.php");
}

?>