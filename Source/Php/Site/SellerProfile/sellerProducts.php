<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "ProfilePage - Products";
	$templateParams["Javascript"] = array("SellerProfile/sellerProfileAside.js");
	$templateParams["Template"] = "SellerProfile/sellerProductsTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");
}

?>