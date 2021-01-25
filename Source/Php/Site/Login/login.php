<?php 
require_once("../baseConfiguration.php");

if (isUserLoggedIn()) {
	header("Location: ../UserProfile/userNotifications.php");
} else if (isSellerLoggedIn()) {
	header("Location: ../SellerProfile/sellerNotifications.php");
} else {
	$templateParams["Titolo"] = "Login";
	$templateParams["Javascript"] = array("Login/login.js");
	$templateParams["Template"] = "Login/loginTemplate.php";
	$templateParams["HeaderType"] = "Login";

	require("../../Template/baseTemplate.php");
}
?>