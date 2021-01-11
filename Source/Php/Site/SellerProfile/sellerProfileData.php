<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: home.php");
} else {
	$templateParams["Titolo"] = "Profile Page - Account Data";
	$templateParams["Javascript"] = array("SellerProfile/sellerProfileAside.js");
	$templateParams["Template"] = "SellerProfile/sellerProfileDataTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");
}

?>