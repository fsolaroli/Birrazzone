<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: home.php");
} else {
	$templateParams["Titolo"] = "Home";
	$templateParams["Javascript"] = array("SellerProfile/modifySellerAccountData.js", "SellerProfile/sellerProfileAside.js");
	$templateParams["Template"] = "SellerProfile/modifySellerAccountDataTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global
	
	require("../../Template/baseTemplate.php");
}

?>