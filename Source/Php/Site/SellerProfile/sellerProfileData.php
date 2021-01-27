<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "Profile Page - ProfileData";
	$templateParams["Javascript"] = array("SellerProfile/sellerProfileAside.js", "SellerProfile/sellerProfileData.js");
	$templateParams["Template"] = "SellerProfile/sellerProfileDataTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");
}

?>