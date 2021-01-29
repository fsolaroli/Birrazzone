<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: ../Login/login.php");
} else {
	$templateParams["Titolo"] = "ProfilePage - ModifyProduct";
	$templateParams["Javascript"] = array("SellerProfile/sellerProfilenav.js", "SellerProfile/modifyProduct.js");
	$templateParams["Template"] = "SellerProfile/modifyProductTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");
}

?>