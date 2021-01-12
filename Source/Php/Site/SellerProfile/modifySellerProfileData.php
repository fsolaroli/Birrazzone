<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "Home";
	$templateParams["Javascript"] = array("SellerProfile/modifySellerProfileData.js", "SellerProfile/sellerProfileAside.js");
	$templateParams["Template"] = "SellerProfile/modifySellerProfileDataTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global
	
	require("../../Template/baseTemplate.php");
}

?>