<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "ProfilePage - ProductPage";
	$templateParams["Javascript"] = array("SellerProfile/sellerProfileAside.js", "SellerProfile/productPage.js");
	$templateParams["Template"] = "SellerProfile/productPageTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");
}

?>