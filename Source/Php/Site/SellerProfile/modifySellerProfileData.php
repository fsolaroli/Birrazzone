<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "ProfilePage - ModifyProfileData";
	$templateParams["Javascript"] = array("SellerProfile/modifySellerProfileData.js", "SellerProfile/sellerProfileAside.js");
	$templateParams["Template"] = "SellerProfile/modifySellerProfileDataTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global
	
	require("../../Template/baseTemplate.php");
}

?>