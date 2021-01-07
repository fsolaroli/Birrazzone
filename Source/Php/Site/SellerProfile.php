<?php
require_once("baseConfiguration.php");

if(empty($dbh->getSeller($_SESSION["sellerId"])) || !isSellerLoggedIn()){
	header("Location: home.php");
} else {
	$templateParams["Titolo"] = "Home";
	$templateParams["Javascript"] = array("jquery-3.4.1.min.js","sellerProfile.js");
	$templateParams["Template"] = "sellerProfileTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global
	
	require("../Template/baseTemplate.php");
}

?>