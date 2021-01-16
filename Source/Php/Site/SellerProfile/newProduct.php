<?php

require_once("../baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: ../Home/home.php");
} else {
	$templateParams["Titolo"] = "ProfilePage - AddNewProduct";
	$templateParams["Javascript"] = array("SellerProfile/sellerProfileAside.js", "SellerProfile/newProduct.js");
	$templateParams["Template"] = "SellerProfile/newProductTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	require("../../Template/baseTemplate.php");
}

?>