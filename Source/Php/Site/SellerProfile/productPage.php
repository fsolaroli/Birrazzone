<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "ProfilePage - Notification";
	$templateParams["Javascript"] = array("SellerProfile/sellerProfileAside.js", "SellerProfile/productPage.js");
	$templateParams["Template"] = "SellerProfile/productPageTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");
}

?>