<?php
require_once("baseConfiguration.php");

if(!isSellerLoggedIn()){
	header("Location: home.php");
} else {
	$templateParams["Titolo"] = "Home";
	$templateParams["Javascript"] = array("jquery-3.4.1.min.js","modifySellerAccountData.js");
	$templateParams["Template"] = "modifySellerAccountDataTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global
	
	require("../Template/baseTemplate.php");
}

?>