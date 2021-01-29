<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "ProfilePage - Notification";
	$templateParams["Javascript"] = array("SellerProfile/sellerProfilenav.js", "SellerProfile/sellerNotification.js");
	$templateParams["Template"] = "SellerProfile/sellerNotificationsTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");
}

?>