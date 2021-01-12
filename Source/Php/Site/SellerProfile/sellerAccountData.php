<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "Profile Page - Account Data";
	$templateParams["Javascript"] = array("SellerProfile/sellerProfileAside.js","SellerProfile/sellerAccountData.js");
	$templateParams["Template"] = "SellerProfile/sellerAccountDataTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");
}

?>