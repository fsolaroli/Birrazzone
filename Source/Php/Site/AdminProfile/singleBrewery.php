<?php
require_once("../baseConfiguration.php");
if(!isAdminLoggedIn() || empty($_SESSION["adminLoggedIn"])){
	header("Location: ../login/adminLogin.php");
}else{
	$templateParams["Titolo"] = "AdminPage - Birrificio";
	$templateParams["Javascript"] = array("AdminProfile/deleteBrewery.js", "AdminProfile/adminProfileAside.js");
	$templateParams["Template"] = "AdminProfile/singleBreweryTemplate.php";
	$templateParams["HeaderType"] = "Profile"; //Profile, Login, Global

	$idbirrificio = -1;
	if(isset($_GET["id"])){
		$idbirrificio = $_GET["id"];
	}

	$templateParams["birre"] = $dbh->getSellerBeer($idbirrificio);
	$birrificio = $dbh->getSeller($idbirrificio)[0];
}

require("../../Template/baseTemplate.php");
?>