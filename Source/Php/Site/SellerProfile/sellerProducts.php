<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: home.php");
} else {
	$templateParams["Titolo"] = "ProfilePage - Notification";
	$templateParams["Javascript"] = array("SellerProfile/sellerProfileAside.js");
	$templateParams["Template"] = "SellerProfile/sellerProductsTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");
}

?>