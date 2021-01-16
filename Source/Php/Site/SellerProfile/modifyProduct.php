<?php
require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "ProfilePage - ModifyProduct";
	$templateParams["Javascript"] = array("SellerProfile/sellerProfileAside.js", "SellerProfile/modifyProduct.js");
	$templateParams["Template"] = "SellerProfile/modifyProductTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");
}

?>