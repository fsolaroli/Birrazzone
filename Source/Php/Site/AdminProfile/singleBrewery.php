<?php
require_once("../baseConfiguration.php");
if(isAdminLoggedIn()){
	$templateParams["Titolo"] = "AdminPage - Birrificio";
	$templateParams["Javascript"] = array("AdminProfile/deleteBrewery.js");
	$templateParams["Template"] = "AdminProfile/singleBreweryTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	$idbirrificio = -1;
	if(isset($_GET["id"])){
		$idbirrificio = $_GET["id"];
	}

	$templateParams["birre"] = $dbh->getBeer($idbirrificio);
	$templateParams["birrificio"] = $dbh->getBreweryById($idbirrificio)[0];
}else{
	$templateParams["Titolo"] = "AdminLogin";
	$templateParams["Javascript"] = array("Login/adminLogin.js");
	$templateParams["Template"] = "Login/adminLoginTemplate.php";
	$templateParams["HeaderType"] = "Login"; //Profile, Login, Global
}

require("../../Template/baseTemplate.php");
?>