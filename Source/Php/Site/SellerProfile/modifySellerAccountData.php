<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "ProfilePage - ModifyAccountData";
	$templateParams["Javascript"] = array("SellerProfile/modifySellerAccountData.js", "SellerProfile/sellerProfileAside.js");
	$templateParams["Template"] = "SellerProfile/modifySellerAccountDataTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global
	
	require("../../Template/baseTemplate.php");
}

?>